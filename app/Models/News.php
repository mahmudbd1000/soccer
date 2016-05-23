<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News  extends Eloquent {

    protected $table = 'soccer_news';
    protected $hidden = array();
    public $timestamps = false;

}
