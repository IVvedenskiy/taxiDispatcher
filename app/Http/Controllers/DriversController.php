<?php

namespace App\Http\Controllers;

use App\TaxiDriver;

class DriversController extends Controller
{
    public function showDrivers(){
        $taxiDrivers = TaxiDriver::all();
        foreach ($taxiDrivers as $driver){
            $driver->getCar();
        }
        return view('drivers-table', ['taxiDrivers' => $taxiDrivers]);
    }
}
