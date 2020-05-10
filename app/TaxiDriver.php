<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiDriver extends Model
{
    public function getCar(){
       return $this->belongsTo('App\Car', 'foreign_key', 'car_id', "id");
    }

    public function getCarInfo(){
        $car = Car::find();
    }
}
