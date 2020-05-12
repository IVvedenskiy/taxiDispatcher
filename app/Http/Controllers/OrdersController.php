<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\MedInspection;
use App\Order;
use App\TaxiDriver;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OrdersController extends Controller
{
    public function createOrder(Request $request){
        $validation = $request->validate([
            'addressFrom' => ['required', 'string', 'max:255', 'min:5'],
            'addressTo' => ['required', 'string', 'max:255', 'min:5'],
            'description' => ['string', 'max:255'],
            'tariff' => ['required', 'string', 'max:255', 'min:1'],
            'client_id' => ['required']
        ]);

        $order = new Order();
        $order->addressFrom = $request->input('addressFrom');
        $order->addressTo = $request->input('addressTo');
        $order->description = $request->input('description');
        $order->tariff = $request->input('tariff');
        $order->price = 300;
        $order->client_id = $request->input('client_id');
        $order->driver_id= 4;


//        $address = new Address();
//        $address->address = $order->addressFrom;
//        $address->longitude = 11.1;
//        $address->latitude = 22.2;

//        $route = new Route();

        $order->save();

        return redirect()->route('orders-table');
    }

    public function showOrders(){
        $clients = Client::all();
        $orders = Order::all();
        $taxiDrivers = TaxiDriver::all();
        return view('show-table.orders-table',
            ['clients' => $clients,
            'taxiDrivers' => $taxiDrivers,
            'orders' => $orders]);
    }

    public function showCreateOrderForm(){
        $clients = Client::all();
        $orders = Order::all();
        return view('create-forms.create-order', ['orders' => $orders, 'clients' => $clients]);
    }
}
