<?php

namespace App\Http\Controllers;

use App\Client;
use App\Holiday;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'date' => ['required', 'date', 'max:255', 'min:1'],
            'name' => ['required', 'string', 'max:255', 'min:1']
        ]);

        $holiday = new Holiday();
        $holiday->date = $request->input('date');
        $holiday->name = $request->input('name');

        $holiday->save();


        return redirect()->route('holidays-table');
    }

    public function showCreateHolidayForm(){
        return view('create-forms.create-holiday');
    }

    public function showHolidays(){
        $holidays = Holiday::all();
        return view('show-table.holidays-table', ['holidays' => $holidays]);
    }
}
