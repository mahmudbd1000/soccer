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
                ->where('s.category_id', $catId)
                ->orderBy('schedule_result.updated_status')
                ->orderBy('schedule_result.match_date', 'desc');
        if ($matchType == 1) {
            $schedule->where('schedule_result.match_date', '>', $today);
        } else {
            $schedule->where('schedule_result.match_date', '<=', $today);
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
            $del = "<a onclick='$confirm' href='" . URL::to('delete_schedule') . "/" . $catId . "/" . $val->id . "' title='Delete Schedule'>";
            $del .= "<i class='color_red fa fa-trash'></i></a>";

            $edit = "<a href='" . URL::to('edit_schedule') . "/" . $catId . "/" . $val->id . "' title='Edit Schedule'>";
            $edit .= "<i class='color_bluegreen fa fa-edit'></i></a>&nbsp; | &nbsp";
            $btnClass = 'btn-primary';
            if($val->updated_status == 1){
                $btnClass = 'btn-success';
            }
            $update = "<a href='$val->id' class='btn ".$btnClass." btn-xs update_match_result' title='Update Result'>";
            $update .= "Update</a> ";
            $matchDate = $val->match_date . ' ' . $val->match_time;
            $hGoal = "<input style='width:50px;' type='text' value='$val->home_team_goal' disabled='disabled' class='home_goal_input'>";
            $vGoal = "<input style='width:50px;' type='text' value='$val->visiting_team_goal' disabled='disabled' class='visiting_goal_input'>";
            $json .='{
                        "dateTime": "<strong class=\"color_bluegreen\">' . date('d-M-Y :: h:i A', strtotime($matchDate)) . '</strong>",
                        "TeamInfo": "<strong class=\"color_green\">' . $val->homeTeam . '</strong> - VS - <strong class=\"color_bluegreen\">' . $val->visitingTeam . '</strong>",
                        "stadium": "' . $val->stadium_name . '",
                        "homeRes": "' . $hGoal . '",
                        "visitingRes": "' . $vGoal . '",
                        "update": "' . $update . '",
                        "action": "' . $edit . $del . '"
                      }';
            if ($key + 1 < $totalData) {
                $json .=',';
            }
        }


        $json .= ']}';


        echo $json;
    }

    /**
     * admin page schedule ajax
     * Created : 2016-may-21
     * Dev : Bulbul Mahmud Nito
     * */
    public function schedule_list_dashboard(Request $req) {
        $draw = $req->draw;
        $today = date("Y-m-d");
        $searchStr = $req->search['value'];
        $schedule = $this->schedule->select('schedule_result.*', 'std.stadium_name', 'ht.team_name as homeTeam', 'vt.team_name as visitingTeam')
                ->leftJoin('teams as ht', 'ht.id', '=', 'schedule_result.home_team_id')
                ->leftJoin('teams as vt', 'vt.id', '=', 'schedule_result.visiting_team_id')
                ->leftJoin('stadiums as std', 'std.id', '=', 'schedule_result.stadium_id')
                ->leftJoin('standings as s', 's.id', '=', 'schedule_result.standing_id')
                ->orderBy('schedule_result.match_date');
        $schedule->where('schedule_result.match_date', '>', $today);

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
            $matchDate = $val->match_date . ' ' . $val->match_time;
            $json .='{
                        "dateTime": "<strong class=\"color_bluegreen\">' . date('d-M-Y :: h:i A', strtotime($matchDate)) . '</strong>",
                        "TeamInfo": "<strong class=\"color_green\">' . $val->homeTeam . '</strong> - VS - <strong class=\"color_bluegreen\">' . $val->visitingTeam . '</strong>",
                        "stadium": "' . $val->stadium_name . '"
                      }';
            if ($key + 1 < $totalData) {
                $json .=',';
            }
        }


        $json .= ']}';


        echo $json;
    }

    public function save_schedule_result_ajax(Request $req) {
        $update['home_team_goal'] = $req->hGoal;
        $update['visiting_team_goal'] = $req->vGoal;
        $update['match_status'] = 1;
        $schedule = $this->schedule->where('id', $req->scheduleId);
        $scheduleData = $schedule->first();
        if ($scheduleData->updated_status == 0) {
            $update['updated_status'] = 1;
        }
        $schedule->update($update);


        //update home team
        $homeTeam = $this->teams->where('id', $scheduleData->home_team_id);

        $vTeam = $this->teams->where('id', $scheduleData->visiting_team_id);

        if ($scheduleData->updated_status == 1) {
            $homeTeamData = $homeTeam->first();
            $vTeamData = $vTeam->first();
            if ($scheduleData->home_team_goal > $scheduleData->visiting_team_goal) {
                $homeRemove['won'] = ($homeTeamData->won - 1);
                $homeRemove['points'] = ($homeTeamData->points - 3);

                $vRemove['lost'] = ($vTeamData->won - 1);
            } else if ($scheduleData->home_team_goal < $scheduleData->visiting_team_goal) {
                $homeRemove['lost'] = ($homeTeamData->lost - 1);

                $vRemove['points'] = ($vTeamData->points - 3);
                $vRemove['won'] = ($vTeamData->won - 1);
            } else if ($scheduleData->home_team_goal == $scheduleData->visiting_team_goal) {
                $homeRemove['tied'] = ($homeTeamData->tied - 1);
                $vRemove['tied'] = ($vTeamData->tied - 1);
            }
            $homeRemove['gf'] = ($homeTeamData->gf - $scheduleData->home_team_goal);
            $homeRemove['ga'] = ($homeTeamData->ga - $scheduleData->visiting_team_goal);

            $vRemove['gf'] = ($vTeamData->gf - $scheduleData->visiting_team_goal);
            $vRemove['ga'] = ($vTeamData->ga - $scheduleData->home_team_goal);

            $homeTeam->update($homeRemove);
            $vTeam->update($vRemove);
        }


        $homePreData = $homeTeam->first();
        $vPreData = $vTeam->first();
        if ($req->hGoal > $req->vGoal) {
            $hPoints = 3;
            $vPoints = 0;
            $homeData['won'] = ($homePreData->won + 1);
            $vData['lost'] = ($vPreData->lost + 1);
        } elseif ($req->hGoal < $req->vGoal) {
            $hPoints = 0;
            $vPoints = 3;
            $homeData['lost'] = ($homePreData->lost + 1);
            $vData['won'] = ($vPreData->won + 1);
        } elseif ($req->hGoal == $req->vGoal) {
            $hPoints = 1;
            $vPoints = 1;
            $homeData['tied'] = ($homePreData->tied + 1);
            $vData['tied'] = ($vPreData->tied + 1);
        }
        $homeData['gf'] = ($homePreData->gf + $req->hGoal);
        $homeData['ga'] = ($homePreData->ga + $req->vGoal);
        $homeData['points'] = ($homePreData->points + $hPoints);

        $vData['gf'] = ($vPreData->gf + $req->vGoal);
        $vData['ga'] = ($vPreData->ga + $req->hGoal);
        $vData['points'] = ($vPreData->points + $vPoints);

        $homeTeam->update($homeData);
        $vTeam->update($vData);

        echo 1;
    }

    /**
     * admin page delete schedule
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_schedule($catId, $scheduleId) {
        $this->schedule->where('id', $scheduleId)->delete();
        return Redirect::to('schedule_list/' . $catId);
    }

    /**
     * admin page delete schedule
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function edit_schedule($catId, $scheduleId) {
        $data['schedule'] = $this->schedule->where('id', $scheduleId)->first();
        $data['catId'] = $catId;
        $data['stadiums'] = $this->stadium->where('status', 1)->orderBy('stadium_name')->get();
        $data['standings'] = $this->standings->where('status', 1)->orderBy('category_id')->orderBy('standing_name')->get();
        return view('Admin.edit_schedule', $data);
    }

    /**
     * admin page update standing
     * Created : 2016-may-24
     * Dev : Bulbul Mahmud Nito
     * */
    public function update_schedule(Request $req) {

        $validator = Validator::make($req->all(), [
                    'staning' => 'required',
                    'stadium' => 'required',
                    'homeTeam' => 'required',
                    'visitingTeam' => 'required',
                    'matchDate' => 'required',
                    'matchTime' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error_msg', 'Error in update process');
            return Redirect::to(URL::previous());
        } else {
            $update['standing_id'] = $req->staning;
            $update['home_team_id'] = $req->homeTeam;
            $update['visiting_team_id'] = $req->visitingTeam;
            $update['stadium_id'] = $req->stadium;
            $update['match_date'] = date('Y-m-d', strtotime($req->matchDate));
            $update['match_time'] = date('H:i:s', strtotime($req->matchTime));
            $schedule = $this->schedule->where('id', $req->scheduleId);
            $schedule->update($update);
            Session::flash('success_msg', 'Schedule has been added!');
            return Redirect::to('schedule_list/' . $req->catId);
        }
    }

}
