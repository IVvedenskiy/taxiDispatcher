<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function getDriver()
    {
        return $this->belongsTo('App\TaxiDriver');
    }
}
