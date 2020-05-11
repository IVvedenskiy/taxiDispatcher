<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'number' => ['required', 'string', 'max:10', 'min:4'],
            'mark' => ['required', 'string', 'max:255', 'min:1'],
            'model' => ['required', 'string', 'max:255', 'min:1'],
            'seatsNumber' => ['required', 'int']
        ]);

        $car = new Car();
        $car->number = $request->input('number');
        $car->mark = $request->input('mark');
        $car->model = $request->input('model');
        $car->seatsNumber = $request->input('seatsNumber');

        $car->save();

        return redirect()->route('cars-table');
    }

    public function showCreateCarForm()
    {
        return view('create-forms.create-car');
    }

    public function showCars()
    {
        $cars = Car::all();
        return view('show-table.cars-table', ['cars' => $cars]);
    }
}
