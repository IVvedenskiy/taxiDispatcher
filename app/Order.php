<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getDriver()
    {
        return $this->hasMany('App\TaxiDriver', 'driver_id', 'id');
    }
}
