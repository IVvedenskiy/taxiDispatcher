<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\Order;
use App\TaxiDriver;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function createOrder(Request $request)
    {
        $validation = $request->validate([
            'addressFrom' => ['required', 'string', 'max:255', 'min:5'],
            'addressTo' => ['required', 'string', 'max:255', 'min:5'],
            'description' => ['string', 'max:255'],
            'tariff' => ['required', 'string', 'max:255', 'min:1'],
            'passengersNumber' => ['required', 'integer', 'max:10', 'min:1'],
            'client_id' => ['required']
        ]);

        $order = new Order();
        $order->addressFrom = $request->input('addressFrom');
        $order->addressTo = $request->input('addressTo');
        $order->description = $request->input('description');
        $order->tariff = $request->input('tariff');
        $order->price = $request->input('price');
        $order->passengersNumber = $request->input('passengersNumber');
        $order->completed = false;
        $order->client_id = $request->input('client_id');
        $order->driver_id = 4;

        $order->save();

        return redirect()->route('orders-table');
    }

    public function showOrders()
    {
        $clients = Client::all();
        $orders = Order::all();
        $taxiDrivers = TaxiDriver::all();
        return view('show-table.orders-table',
            ['clients' => $clients,
                'taxiDrivers' => $taxiDrivers,
                'orders' => $orders]);
    }

    public function showCreateOrderForm()
    {
        $clients = Client::all();
        $orders = Order::all();
        $drivers = TaxiDriver::all();
        return view('create-forms.create-order', ['orders' => $orders, 'clients' => $clients, 'drivers' => $drivers]);
    }
}
