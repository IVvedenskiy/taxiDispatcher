<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechInspection extends Model
{
    protected $table = 'tech_inspection_tables';

    public function getDriver()
    {
        return $this->hasMany('App\Driver', 'driver_id', 'id');
    }
}
