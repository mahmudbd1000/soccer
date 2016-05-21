<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Standings;
use App\Models\Teams;
use App\Models\Stadiums;
use App\Models\ScheduleResult;
use Illuminate\Http\Request;
use Validator;
use Session;
use URL;
use Redirect;

class ScheduleController extends Controller {

    private $standings;
    private $teams;
    private $stadium;
    private $schedule;

    public function __construct() {
        if (!Session::get('is_admin_login')) {
            return Redirect::to('app_admin')->send();
        }
        $this->standings = new Standings();
        $this->teams = new Teams();
        $this->stadium = new Stadiums();
        $this->schedule = new ScheduleResult();
    }

    /**
     * admin page add_schedule
     * Created : 2016-may-20
     * Dev : Bulbul Mahmud Nito
     * */
    public function add_schedule() {
        $data['stadiums'] = $this->stadium->where('status', 1)->orderBy('stadium_name')->get();
        $data['standings'] = $this->standings->where('status', 1)->orderBy('category_id')->orderBy('standing_name')->get();
        return view('Admin.add_schedule', $data);
    }

    //get team names by standing id
    public function get_team_name_by_standing($standingId) {
        $teamData = $this->teams->select('id', 'team_name')->where('standing_id', $standingId)->get();
        echo json_encode($teamData);
    }

    /**
     * admin page save standing
     * Created : 2016-may-21
     * Dev : Bulbul Mahmud Nito
     * */
    public function save_schedule(Request $req) {

        $validator = Validator::make($req->all(), [
                    'staning' => 'required',
                    'stadium' => 'required',
                    'homeTeam' => 'required',
                    'visitingTeam' => 'required',
                    'matchDate' => 'required',
                    'matchTime' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error_msg', 'Error in add process');
            return Redirect::to(URL::previous());
        } else {

            $schedule = $this->schedule;
            $schedule->standing_id = $req->staning;
            $schedule->home_team_id = $req->homeTeam;
            $schedule->visiting_team_id = $req->visitingTeam;
            $schedule->stadium_id = $req->stadium;
            $schedule->match_date = date('Y-m-d', strtotime($req->matchDate));
            $schedule->match_time = date('H:i:s', strtotime($req->matchTime));
            $schedule->save();
            Session::flash('success_msg', 'Schedule has been added!');
            return Redirect::to(URL::previous());
        }
    }

    /**
     * admin page standing list
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function schedule_list($categoryId) {
        $cat = array(1 => ' Standings Adultos', 2 => 'Standings Infantils');
        $data['category'] = $cat[$categoryId];
        $data['categoryId'] = $categoryId;
        $data['standingsAdultos'] = $this->standings->where('category_id', 1)->get();
        $data['standingsInfantils'] = $this->standings->where('category_id', 2)->get();
        return view('Admin.schedule_list', $data);
    }

    /**
     * admin page schedule ajax
     * Created : 2016-may-21
     * Dev : Bulbul Mahmud Nito
     * */
    public function get_schedule_list_ajax($matchType, $catId, Request $req) {
        $draw = $req->draw;
        $today = date("Y-m-d");
        $searchStr = $req->search['value'];
        $schedule = $this->schedule->select('schedule_result.*', 'std.stadium_name', 'ht.team_name as homeTeam', 'vt.team_name as visitingTeam')
                ->leftJoin('teams as ht', 'ht.id', '=', 'schedule_result.home_team_id')
                ->leftJoin('teams as vt', 'vt.id', '=', 'schedule_result.visiting_team_id')
                ->leftJoin('stadiums as std', 'std.id', '=', 'schedule_result.stadium_id')
                ->leftJoin('standings as s', 's.id', '=', 'schedule_result.standing_id')
                ->where('s.category_id', $catId)->orderBy('schedule_result.match_date');
                if($matchType == 1){
                   $schedule->where('schedule_result.match_date','>', $today);
                }else{
                    $schedule->where('schedule_result.match_date','<=', $today);
                }
                
                
        if ($searchStr != '') {
            $schedule->where('ht.team_name', 'like', '%' . $searchStr . '%');
            $schedule->orWhere('vt.team_name', 'like', '%' . $searchStr . '%');
        }
        $total = $schedule->count();
        $schedule->limit($req->length)->offset($req->start);
        $data = $schedule->get();
        $json = '{
                    "draw": ' . $draw . ',
                    "recordsTotal": ' . $total . ',
                    "recordsFiltered": ' . $total . ',';

        $json .= '"data": [';

        $totalData = count($data);
        foreach ($data as $key => $val) {
            $confirm = 'return confirm(\"Are you sure you want to delete this schedule?\");';
            $del = "<a onclick='$confirm' href='" . URL::to('delete_schedule') . "/".$catId."/" . $val->id . "' title='Delete Schedule'>";
            $del .= "<i class='color_red fa fa-trash'></i></a>";
            $update = "<a href='$val->id' class='btn btn-primary btn-xs update_match_result' title='Update Result'>";
            $update .= "Update</a> ";
            $matchDate = $val->match_date.' '.$val->match_time;
            $hGoal = "<input style='width:50px;' type='text' value='$val->home_team_goal' disabled='disabled' class='home_goal_input'>";
            $vGoal = "<input style='width:50px;' type='text' value='$val->visiting_team_goal' disabled='disabled' class='visiting_goal_input'>";
            $json .='{
                        "dateTime": "<strong class=\"color_bluegreen\">' . date('d-M-Y :: h:i A', strtotime($matchDate)) . '</strong>",
                        "TeamInfo": "<strong class=\"color_green\">' . $val->homeTeam .'</strong> - VS - <strong class=\"color_bluegreen\">'.$val->visitingTeam . '</strong>",
                        "stadium": "' . $val->stadium_name . '",
                        "homeRes": "' . $hGoal . '",
                        "visitingRes": "' . $vGoal . '",
                        "update": "' . $update . '",
                        "action": "' . $del . '"
                      }';
            if ($key + 1 < $totalData) {
                $json .=',';
            }
        }


        $json .= ']}';


        echo $json;
    }
    
    public function save_schedule_result_ajax(Request $req){
        $update['home_team_goal'] = $req->hGoal;
        $update['visiting_team_goal'] = $req->vGoal;
        $update['match_status'] = 1;
        $this->schedule->where('id', $req->scheduleId)->update($update);
        echo 1;
    }
    
     /**
     * admin page delete schedule
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_schedule($catId, $scheduleId) {
        $this->schedule->where('id', $scheduleId)->delete();
        return Redirect::to('schedule_list/'.$catId);
    }
    

    /**
     * admin page standing edit
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function edit_standing($standingId) {
        $data['category'] = $this->standingCategories->where('status', 1)->get();
        $data['standingData'] = $this->standings->where('id', $standingId)->first();
        return view('Admin.edit_standing', $data);
    }

    /**
     * admin page update query
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function update_standing($standingId, Request $req) {
        $update['category_id'] = $req->category;
        $update['standing_name'] = $req->standing_name;
        $update['status'] = $req->status;
        $this->standings->where('id', $standingId)->update($update);
        return Redirect::to('standing_list');
    }

    /**
     * admin page active standing
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function active_standing($standingId) {
        $update['status'] = 1;
        $this->standings->where('id', $standingId)->update($update);
        return Redirect::to('standing_list');
    }

    /**
     * admin page active standing
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function inactive_standing($standingId) {
        $update['status'] = 0;
        $this->standings->where('id', $standingId)->update($update);
        return Redirect::to('standing_list');
    }

    /**
     * admin page active standing
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_standing($standingId) {
        $this->standings->where('id', $standingId)->delete();
        return Redirect::to('standing_list');
    }

    /* ###########################################End of standings##################################### */


//    team start

    /**
     * admin page add team
     * Created : 2016-may-7
     * Dev : Bulbul Mahmud Nito
     * */
    public function add_team() {
        $data['standings'] = $this->standings->where('status', 1)->orderBy('category_id', 'asc')->get();
        return view('Admin.add_team', $data);
    }

    /**
     * admin page save team data
     * Created : 2016-may-7
     * Dev : Bulbul Mahmud Nito
     * */
    public function save_team(Request $req) {
        $team = $req->team_name;

        foreach ($team as $val) {
            $teamObj = new Teams();
            $teamObj->standing_id = $req->standings;
            $teamObj->team_name = $val;
            $teamObj->status = $req->status;
            $teamObj->save();
        }
        return Redirect::to('add_team');
    }

    /**
     * admin page team_list
     * Created : 2016-may-12
     * Dev : Bulbul Mahmud Nito
     * */
    public function team_list() {
        return view('Admin.team_list');
    }

    /**
     * admin page team_list
     * Created : 2016-may-12
     * Dev : Bulbul Mahmud Nito
     * */
    public function get_team_list_ajax(Request $req) {
        $draw = $req->draw;
        $searchStr = $req->search['value'];
        $teams = $this->teams->select('teams.*', 'standings.standing_name')
                        ->leftJoin('standings', 'standings.id', '=', 'teams.standing_id')
                        ->where('teams.status', 1)->orderBy('teams.team_name');
        if ($searchStr != '') {
            $teams->where('teams.team_name', 'like', '%' . $searchStr . '%');
        }
        $totalTeams = $teams->count();
        $teams->limit($req->length)->offset($req->start);
        $teamData = $teams->get();
        $teamJson = '{
                    "draw": ' . $draw . ',
                    "recordsTotal": ' . $totalTeams . ',
                    "recordsFiltered": ' . $totalTeams . ',';

        $teamJson .= '"data": [';

        $totalData = count($teamData);
        foreach ($teamData as $key => $val) {
            $confirm = 'return confirm(\"Are you sure you want to delete this team?\");';
            $del = "<a onclick='$confirm' href='" . URL::to('delete_team') . "/" . $val->id . "' title='Delete team'>";
            $del .= "<i class='color_red fa fa-trash'></i></a>";
            $teamJson .='{
                        "team_name": "' . $val->team_name . '",
                        "standing": "' . $val->standing_name . '",
                        "won": "' . $val->won . '",
                        "lost": "' . $val->lost . '",
                        "tied": "' . $val->tied . '",
                        "gf": "' . $val->gf . '",
                        "ga": "' . $val->ga . '",
                        "diff": "' . $val->diff . '",
                        "points": "' . $val->points . '",
                        "action": "' . $del . '"
                      }';
            if ($key + 1 < $totalData) {
                $teamJson .=',';
            }
        }


        $teamJson .= ']}';


        echo $teamJson;
    }

    /**
     * admin page team_delete
     * Created : 2016-may-18
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_team($teamId) {
        $this->teams->find($teamId)->delete();
        return Redirect::to('team_list');
    }

    //stadium start
    /**
     * admin page add stadium
     * Created : 2016-may-18
     * Dev : Bulbul Mahmud Nito
     * */
    public function add_stadium() {
        return view('Admin.add_stadium');
    }

    /**
     * admin page save stadium data
     * Created : 2016-may-18
     * Dev : Bulbul Mahmud Nito
     * */
    public function save_stadium(Request $req) {
        $stadium = $req->stadium_name;

        foreach ($stadium as $val) {
            $stadiumObj = new Stadiums();
            $stadiumObj->stadium_name = $val;
            $stadiumObj->status = $req->status;
            $stadiumObj->save();
        }
        return Redirect::to('add_stadium');
    }

    /**
     * admin page stadium_list
     * Created : 2016-may-12
     * Dev : Bulbul Mahmud Nito
     * */
    public function stadium_list() {
        return view('Admin.stadium_list');
    }

    /**
     * admin page stadium_list ajax
     * Created : 2016-may-20
     * Dev : Bulbul Mahmud Nito
     * */
    public function get_stadium_list_ajax(Request $req) {
        $draw = $req->draw;
        $searchStr = $req->search['value'];
        $stadiums = $this->stadium->where('status', 1)->orderBy('stadium_name');
        if ($searchStr != '') {
            $stadiums->where('stadium_name', 'like', '%' . $searchStr . '%');
        }
        $totalStadiums = $stadiums->count();
        $stadiums->limit($req->length)->offset($req->start);
        $stadiumData = $stadiums->get();
        $stadiumJson = '{
                    "draw": ' . $draw . ',
                    "recordsTotal": ' . $totalStadiums . ',
                    "recordsFiltered": ' . $totalStadiums . ',';

        $stadiumJson .= '"data": [';

        $totalData = count($stadiumData);
        $sl = 1 + $req->start;
        foreach ($stadiumData as $key => $val) {
            $confirm = 'return confirm(\"Are you sure you want to delete this location?\");';
            $del = "<a onclick='$confirm' href='" . URL::to('delete_stadium') . "/" . $val->id . "' title='Delete team'>";
            $del .= "<i class='color_red fa fa-trash'></i></a>";
            $stadiumJson .='{
                        "sl": "' . $sl . '",
                        "stadium_name": "' . $val->stadium_name . '",
                        "action": "' . $del . '"
                      }';
            if ($key + 1 < $totalData) {
                $stadiumJson .=',';
            }
            $sl++;
        }
        $stadiumJson .= ']}';
        echo $stadiumJson;
    }

    /**
     * admin page delete_stadium
     * Created : 2016-may-20
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_stadium($stadiumId) {
        $this->stadium->find($stadiumId)->delete();
        return Redirect::to('stadium_list');
    }

}
