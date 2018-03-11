<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function detail()
    {
    	return $this->hasOne('App\Models\Detail','uid','id');
    }

    
}
