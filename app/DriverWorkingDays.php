<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverWorkingDays extends Model
{
    protected $table = 'drivers_working_days';

    public function getDriver()
    {
        return $this->hasMany('App\Driver', 'driver_id', 'id');
    }
}
