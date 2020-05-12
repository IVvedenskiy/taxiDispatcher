<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\TaxiDriver;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function showOrders(){
        $order = new Order();
        $order->order_id =
        $order->address_id =

        $order->save();

        $clients = Client::all();
        $orders = Order::all();
        $taxiDrivers = TaxiDriver::all();
        return view('show-table.orders-table',
            ['clients' => $clients,
                'taxiDrivers' => $taxiDrivers,
                'orders' => $orders]);
    }
}
