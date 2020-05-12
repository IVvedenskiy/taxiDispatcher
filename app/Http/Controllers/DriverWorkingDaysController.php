<?php

namespace App\Http\Controllers;

use App\DriverWorkingDays;
use App\TaxiDriver;
use Illuminate\Http\Request;

class DriverWorkingDaysController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'date' => ['required', 'date'],
            'shift_start' => ['required', 'date'],
            'shift_end' => ['required', 'date'],
            'driver_id' => ['required']
        ]);

        $driverWorkingDays = new DriverWorkingDays();
        $driverWorkingDays->date = $request->input('date');
        $driverWorkingDays->shift_start = $request->input('shift_start');
        $driverWorkingDays->shift_end = $request->input('shift_end');
        $driverWorkingDays->driver_id = $request->input('driver_id');

        $driverWorkingDays->save();

        return redirect()->route('driversWorkingDays-table');
    }

    public function showCreateDriverWorkingDaysForm()
    {
        $taxiDrivers = TaxiDriver::all();
        $driverWorkingDays = DriverWorkingDays::all();
        return view('create-forms.create-driversWorkingDays', ['driversWorkingDays' => $driverWorkingDays, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showDriverWorkingDays(){
        $taxiDrivers = TaxiDriver::all();
        $driversWorkingDays = DriverWorkingDays::all();
        return view('show-table.driversWorkingDays-table', ['driversWorkingDays' => $driversWorkingDays, 'taxiDrivers' => $taxiDrivers]);
    }
}
