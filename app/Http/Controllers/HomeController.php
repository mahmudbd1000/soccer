<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use URL;

class HomeController extends Controller {

    public function __construct() {
    }

    public function index() {
        return view('home');
    }


}
