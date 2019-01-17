<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public function cases()
    {
        return $this->hasMany('App\Cases'); 
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
