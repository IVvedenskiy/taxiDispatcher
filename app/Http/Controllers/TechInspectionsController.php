<?php

namespace App\Http\Controllers;

use App\MedInspection;
use App\TaxiDriver;
use App\TechInspection;
use Illuminate\Http\Request;

class TechInspectionsController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'insurance' => ['required', 'boolean'],
            'license' => ['required', 'boolean'],
            'brakes' => ['required', 'boolean'],
            'steering' => ['required', 'boolean'],
            'engine' => ['required', 'boolean'],
            'driver_id' => ['required']
        ]);

        $techInspections = new TechInspection();
        $techInspections->insurance = $request->input('insurance');
        $techInspections->license = $request->input('license');
        $techInspections->brakes = $request->input('brakes');
        $techInspections->steering = $request->input('steering');
        $techInspections->engine = $request->input('engine');
        $techInspections->driver_id = $request->input('driver_id');

        $techInspections->save();

        return redirect()->route('techInspections-table');
    }

    public function showCreateTechInspectionsForm()
    {
        $taxiDrivers = TaxiDriver::all();
        $techInspections = TechInspection::all();
        return view('create-forms.create-techInspections', ['techInspections' => $techInspections, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showTechInspections(){
        $taxiDrivers = TaxiDriver::all();
        $techInspections = TechInspection::all();
        return view('show-table.techInspections-table', ['techInspections' => $techInspections, 'taxiDrivers' => $taxiDrivers]);
    }
}
