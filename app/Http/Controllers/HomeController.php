<?php

namespace App\Http\Controllers;

use App\Car;
use App\Client;
use App\Driver;
use App\DriverWorkingDays;
use App\Holiday;
use App\MedInspection;
use App\Order;
use App\TaxiDriver;
use App\TechInspection;

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

    public function showOrders()
    {
        $clients = Client::all();
        $orders = Order::all();
        $taxiDrivers = TaxiDriver::all();
        return view('admin.admin-orders',
            ['clients' => $clients,
                'taxiDrivers' => $taxiDrivers,
                'orders' => $orders]);
    }

    public function showDrivers(){
        $taxiDrivers = TaxiDriver::all();
        $cars = Car::all();
        return view('admin.admin-drivers', ['taxiDrivers' => $taxiDrivers, 'cars' => $cars]);
    }

    public function showClients(){
        $clients = Client::all();
        return view('admin.admin-clients', ['clients' => $clients]);
    }

    public function showCars()
    {
        $cars = Car::all();
        return view('admin.admin-cars', ['cars' => $cars]);
    }

    public function showMedInspections(){
        $taxiDrivers = TaxiDriver::all();
        $medInspections = MedInspection::all();
        return view('admin.admin-medInspections', ['medInspections' => $medInspections, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showTechInspections(){
        $taxiDrivers = TaxiDriver::all();
        $techInspections = TechInspection::all();
        return view('admin.admin-techInspections', ['techInspections' => $techInspections, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showDriverWorkingDays(){
        $taxiDrivers = TaxiDriver::all();
        $driversWorkingDays = DriverWorkingDays::all();
        return view('admin.admin-driversWorkingDays', ['driversWorkingDays' => $driversWorkingDays, 'taxiDrivers' => $taxiDrivers]);
    }

    public function showHolidays(){
        $holidays = Holiday::all();
        return view('admin.admin-holidays', ['holidays' => $holidays]);
    }

    public function showMap()
    {
        $drivers = TaxiDriver::all();
        $orders = Order::all()->where('completed', 0);
        return view('admin.map', ['drivers' => $drivers,
            'orders' => $orders]);
    }
}
