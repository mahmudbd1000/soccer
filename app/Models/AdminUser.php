<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AdminUser extends Eloquent {

    protected $table = 'admin_user';
    protected $hidden = array('password');
    public $timestamps = false;

}
