<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table='cases';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id'); 
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function software()
    {
        return $this->belongsTo('App\Software', 'soft_id');
    }


}
