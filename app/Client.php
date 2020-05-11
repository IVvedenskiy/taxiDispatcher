<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function getClients(){
        return $this->hasMany('App\Client', "id");
    }
}
