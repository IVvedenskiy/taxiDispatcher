<?php

namespace App\Http\Controllers;


use App\Order;
use App\TaxiDriver;

class MapController extends Controller
{


    public function createMarker()
    {
        $orders = Order::where('completed', 0)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function showMap()
    {
        $drivers = TaxiDriver::all();
        $orders = Order::all();
        return view('map.map', ['drivers' => $drivers,
            'orders' => $orders]);
    }
}
