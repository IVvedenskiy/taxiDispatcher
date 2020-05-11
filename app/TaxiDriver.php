<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiDriver extends Model
{
    protected $table = 'taxi_drivers';

    public function getCar()
    {
        return $this->hasOne('App\Car', 'car_id', 'id');
    }
}
