<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    public function getDriver() {
        return $this->belongsTo('App\TaxiDriver', 'id');
    }
}
