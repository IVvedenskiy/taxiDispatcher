<?php

namespace App\Http\Controllers;

use App\MedInspection;
use App\TaxiDriver;
use Illuminate\Http\Request;

class MedInspectionsController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'pressure' => ['required', 'string', 'max:7', 'min:1'],
            'pulse' => ['required', 'integer'],
            'intoxication' => ['required', 'boolean'],
            'temperature' => ['required'],
            'driver_id' => ['required']
        ]);

        $medInspections = new MedInspection();
        $medInspections->pressure = $request->input('pressure');
        $medInspections->pulse = $request->input('pulse');
        $medInspections->intoxication = $request->input('intoxication');
        $medInspections->temperature = $request->input('temperature');
        $medInspections->driver_id = $request->input('driver_id');

        $medInspections->save();

        return redirect()->route('medInspections-table');
    }

    public function showCreateMedInspectionsForm()
    {
        $taxiDrivers = TaxiDriver::all();
        $medInspections = MedInspection::all();
        return view('create-forms.create-medInspections', ['medInspections' => $medInspections, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showMedInspections(){
        $taxiDrivers = TaxiDriver::all();
        $medInspections = MedInspection::all();
        return view('show-table.medInspections-table', ['medInspections' => $medInspections, 'taxiDrivers' => $taxiDrivers]);
    }
}
