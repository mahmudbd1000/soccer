<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Validator;
use Session;
use URL;
use Redirect;

class AdminController extends Controller {

    private $user;

    public function __construct() {
        $this->user = new AdminUser();
    }

    /**
     * admin page login
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function admin_login() {
        if (Session::get('is_admin_login')) {
            return Redirect::to('admin_dashboard')->send();
        }
        return view('Admin.login');
    }

    /**
     * admin page login query
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function admin_login_query(Request $req) {
        if (Session::get('is_admin_login')) {
            return Redirect::to('admin_dashboard')->send();
        }
        $validator = Validator::make($req->all(), [
                    'username' => 'required',
                    'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to(URL::previous())
                            ->withErrors($validator, 'error')
                            ->withInput();
        } else {
            $loginArray = array('user_name' => $req->username, 'password' => md5($req->password));
            $user = $this->user->where($loginArray)->first();
            Session::set('is_admin_login', true);
            Session::set('user_name', $user->user_name);
            Session::set('user_type', $user->type);
            return Redirect::to('admin_dashboard');
        }
    }

    /**
     * admin page dashboard
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function admin_dashboard() {
        if (!Session::get('is_admin_login')) {
            return Redirect::to('app_admin')->send();
        }
        return view('Admin.dashboard');
    }

    /**
     * admin page logout
     * Created : 2016-may-6
     * Dev : Bulbul Mahmud Nito
     * */
    public function admin_logout() {
        Session::flush();
        return Redirect::to('app_admin');
    }

}
