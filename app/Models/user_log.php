<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    //
    protected $table = 'users_log';

     public function user_log($status)
    {
       $user_log = new User_log;
       $user_log_info = $user_log->where('status',$status)->get();
       return $user_log_info;
    }
}
