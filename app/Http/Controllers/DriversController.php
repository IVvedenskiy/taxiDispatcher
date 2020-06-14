<?php

namespace App\Http\Controllers;

use App\Car;
use App\Order;
use App\TaxiDriver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'firstName' => ['required', 'string', 'max:255', 'min:2'],
            'lastName' => ['required', 'string', 'max:255', 'min:2'],
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

    public function showDrivers()
    {
        $taxiDrivers = TaxiDriver::all();
        $cars = Car::all();
        return view('show-table.drivers-table', ['taxiDrivers' => $taxiDrivers, 'cars' => $cars]);
    }

    public function showCharts()
    {
        $orders = Order::all()->where('completed', 1);
        $drivers = TaxiDriver::all();
        $driversMoney = array();

        foreach ($drivers as $driver) {
            $money = 0;
            foreach ($orders as $order) {
                if ($order->driver_id == $driver->id) {
                    $money += $order->price;
                }
            }
            array_push($driversMoney, $driver->id, $money);
        }

        $ordersCompleted = Order::all()->where('completed', 1);
        $drivers = TaxiDriver::all();
        $completedOrders = array();
        $count = 0;

        foreach ($drivers as $driver) {
            foreach ($ordersCompleted as $order) {
                if ($order->driver_id == $driver->id) {
                    $count+=1;
                }
            }
            array_push($completedOrders, $driver->id, $count);
            $count = 0;
        }

        return view('show-table.statistics', ['orders' => $orders, 'drivers' => $drivers, 'driversMoney' => $driversMoney, 'completedOrders' => $completedOrders]);
    }
}
