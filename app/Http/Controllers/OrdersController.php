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
        $order->completed = $this->getRandom();
        $order->client_id = $request->input('client_id');
        $order->driver_id = $request->input('driver_id');

        $order->save();

        return redirect()->route('orders-table');
    }

    public function showOrders()
    {
        $clients = Client::all();
        $orders = Order::orderBy('created_at', 'desc')->get();
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

        $driversLocations = array();

        foreach ($drivers as $driver) {
            array_push($driversLocations, $driver->id, $driver->callSign, $this->randomDriversLocation(47.8, 48),  $this->randomDriversLocation(37.7, 37.85));
        }

        return view('create-forms.create-order', ['orders' => $orders, 'clients' => $clients, 'drivers' => $drivers, 'driversLocations'=>$driversLocations]);
    }

    public function getRandom(){
        try {
            $value = random_int(0, 1);
            if($value == 0) return false;
            else return true;
        } catch (\Exception $e) {
        }
    }

    public function randomDriversLocation($mn, $mx) {
        return mt_rand($mn*10000, $mx*10000)/10000;
    }

    private function distance($latA, $lngA,$latB, $lngB) {
        $R = 6371000;
        $radiansLAT_A = deg2rad($latA);
        $radiansLAT_B = deg2rad($latB);
        $variationLAT = deg2rad($latB - $latA);
        $variationLNG = deg2rad($lngB - $lngA);

        $a = sin($variationLAT/2) * sin($variationLAT/2)
            + cos($radiansLAT_A) * cos($radiansLAT_B) * sin($variationLNG/2) * sin($variationLNG/2);

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        $d = $R * $c;

        return $d;
    }
}
