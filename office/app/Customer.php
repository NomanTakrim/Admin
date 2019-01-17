<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function cases()
    {
        return $this->hasMany('App\Customer');
    }

    /*public function cases1()
    {
        return $this->belongsTo('App\Customer', 'name');
    }*/
}
