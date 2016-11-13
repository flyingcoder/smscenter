<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    
    public function child()
    {
    	return $this->belongsToMany('App\Child');
    }
}
