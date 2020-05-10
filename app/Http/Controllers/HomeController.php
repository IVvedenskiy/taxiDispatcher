<?php

namespace App\Http\Controllers;

use App\TaxiDriver;
use App\Driver;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function showDispatcher()
    {
        return view('dispatcher.dispatcher-dashboard', compact('taxiDriver'));
    }

    public function showDrivers(){
        $taxiDrivers = TaxiDriver::all();
        foreach ($taxiDrivers as $driver){
            $driver->getCar();
        }
        return view('drivers-table', ['taxiDrivers' => $taxiDrivers]);
    }

    public function showAdmin()
    {
        return view('admin-dashboard');
    }

    public function showCreateOrderForm(){
        return view('create-order');
    }

    public function createOrder(){
        $input = request()->all();
        return dd($input);
    }
}
