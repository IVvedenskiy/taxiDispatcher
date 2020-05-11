<?php

namespace App\Http\Controllers;

use App\Car;
use App\TaxiDriver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'firstName' => ['required', 'string', 'regex:/^[A-Za-z\s -_]+$/', 'max:255', 'min:2'],
            'lastName' => ['required', 'string', 'regex:/^[A-Za-z\s -_]+$/', 'max:255', 'min:2'],
            'callSign' => ['required', 'string', 'max:5', 'min:1'],
            'phoneNumber' => ['required', 'string', 'max:255', 'min:1'],
            'status' => ['required', 'string', 'max:255', 'min:1'],
            'car_id' => ['required']
        ]);

        $driver = new TaxiDriver();
        $driver->firstName = $request->input('firstName');
        $driver->lastName = $request->input('lastName');
        $driver->callSign = $request->input('callSign');
        $driver->phoneNumber = $request->input('phoneNumber');
        $driver->status = $request->input('status');
        $driver->car_id = $request->input('car_id');

        $driver->save();

        return redirect()->route('drivers-table');
    }

    public function showCreateDriverForm()
    {
        $cars = Car::all();
        return view('create-forms.create-driver', ['cars' => $cars]);
    }

    public function showDrivers(){
        $taxiDrivers = TaxiDriver::all();
        $cars = Car::all();
        return view('show-table.drivers-table', ['taxiDrivers' => $taxiDrivers, 'cars' => $cars]);
    }
}
