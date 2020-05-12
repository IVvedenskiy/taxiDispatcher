<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedInspection extends Model
{
    protected $table = 'med_inspection_tables';

    public function getDriver()
    {
        return $this->hasMany('App\Driver', 'driver_id', 'id');
    }
}
