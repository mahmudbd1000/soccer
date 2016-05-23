<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Validator;
use Session;
use URL;
use File;
use Redirect;

class NewsController extends Controller {

    private $news;

    public function __construct() {
        if (!Session::get('is_admin_login')) {
            return Redirect::to('app_admin')->send();
        }
        $this->news = new News();
    }

    /**
     * admin page add news
     * Created : 2016-may-23
     * Dev : Bulbul Mahmud Nito
     * */
    public function add_news() {
        return view('Admin.add_news');
    }

    /**
     * admin page save standing
     * Created : 2016-may-21
     * Dev : Bulbul Mahmud Nito
     * */
    public function save_news(Request $req) {

        $validator = Validator::make($req->all(), [
                    'headline' => 'required',
                    'newsDetails' => 'required',
                    'photo' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error_msg', 'Error: Please fill all * fields properly!');
            return Redirect::to(URL::previous());
        } else {

            $news = $this->news;
            $news->headline = $req->headline;
            $news->details = $req->newsDetails;
            $news->posted_by = $req->posted_by;

            $storeFolder = 'assets/img/news/';

            if (Input::file()) {

                $fileName = $_FILES['photo']['name'];


                $image = Input::file('photo');
                $img_name = "news_" . uniqid(10, 20) . time() . '.' . $image->getClientOriginalExtension();

                $path = $storeFolder . $img_name;
                Image::make($image->getRealPath())->resize(800, 600)->save($path);
                $news->photo = $img_name;
            }



            $news->created = date('Y-m-d');
            $news->status = $req->status;
            $news->save();
            Session::flash('success_msg', 'News has been saved!');
            return Redirect::to(URL::previous());
        }
    }

    /**
     * admin page news list
     * Created : 2016-may-23
     * Dev : Bulbul Mahmud Nito
     * */
    public function news_list() {
        return view('Admin.news_list');
    }

    /**
     * admin page news ajax
     * Created : 2016-may-23
     * Dev : Bulbul Mahmud Nito
     * */
    public function news_list_ajax(Request $req) {
        $draw = $req->draw;
        $today = date("Y-m-d");
        $searchStr = $req->search['value'];
        $news = $this->news->
                orderBy('id', 'desc');

        if ($searchStr != '') {
            $news->where('headline', 'like', '%' . $searchStr . '%');
            $news->orWhere('details', 'like', '%' . $searchStr . '%');
        }
        $total = $news->count();
        $news->limit($req->length)->offset($req->start);
        $data = $news->get();
        $json = '{
                    "draw": ' . $draw . ',
                    "recordsTotal": ' . $total . ',
                    "recordsFiltered": ' . $total . ',';

        $json .= '"data": [';

        $totalData = count($data);
        foreach ($data as $key => $val) {
            $photoLink = URL::asset('assets/img/news/' . $val->photo);
            $photo = "<img style='height:60px' src='" . $photoLink . "'>";
            $reporter = '<strong class=\"color_green\">' . $val->posted_by . '</strong><br>' . date("d-M-Y", strtotime($val->created));

            $confirm = 'return confirm(\"Are you sure you want to delete this news?\");';
            $del = "<a onclick='$confirm' href='" . URL::to('delete_news') . "/" . $val->id . "' title='Delete News'>";
            $del .= "<i class='color_red fa fa-trash'></i></a>";
            $edit = "<a  href='" . URL::to('edit_news') . "/" . $val->id . "' title='Edit News'>";
            $edit .= "<i class='fa fa-edit'></i></a>&nbsp; | &nbsp;";

            $json .='{
                        "headline": "<strong class=\"color_bluegreen\">' . $val->headline . '</strong>",
                        "details": "' . substr(strip_tags($val->details), 0, 200) . '",
                        "photo": "' . $photo . '",
                        "reporter": "' . $reporter . '",
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
     * admin page delete news
     * Created : 2016-may-24
     * Dev : Bulbul Mahmud Nito
     * */
    public function delete_news($newsId) {
        $news = $this->news->where('id', $newsId);
        File::delete('assets/img/news/'.$news->first()->photo);
        $news->delete();
        return Redirect::to('news_list/');
    }

}
