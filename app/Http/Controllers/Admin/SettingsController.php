<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandingCategory;
use App\Models\Standings;
use App\Models\Teams;
use App\Models\Stadiums;
use Illuminate\Http\Request;
use Validator;
use Session;
use URL;
use Redirect;

class SettingsController extends Controller {

    private $standingCategories;
    private $standings;
    private $teams;
    private $stadium;

    public function __construct() {
        if (!Session::get('is_admin_login')) {
            return Redirect::to('app_admin')->send();
        }
        $this->standingCategories = new StandingCategory();
        $this->standings = new Standings();
        $this->teams = new Teams();
        $this->stadium = new Stadiums();
    }

    /**
     * admin page add stadings
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function add_standing() {
        $data['category'] = $this->standingCategories->where('status', 1)->get();
        return view('Admin.add_standing', $data);
    }

    /**
     * admin page save standing
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function save_standing(Request $req) {

        $validator = Validator::make($req->all(), [
                    'standing_name' => 'required',
                    'category' => 'required',
                    'status' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error_msg', 'Error in add process');
            return Redirect::to(URL::previous());
        } else {

            $standings = $this->standings;
            $standings->category_id = $req->category;
            $standings->standing_name = $req->standing_name;
            $standings->status = $req->status;
            $standings->created = date("Y-m-d H:i:s");
            $standings->save();
            Session::flash('success_msg', 'Standing has been added!');
            return Redirect::to(URL::previous());
        }
    }

    /**
     * admin page standing list
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function standing_list() {
        $data['standingsAdultos'] = $this->standings->where('category_id', 1)->get();
        $data['standingsInfantils'] = $this->standings->where('category_id', 2)->get();
        return view('Admin.standing_list', $data);
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
