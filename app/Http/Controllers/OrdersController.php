<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showOrders(){
        return view('orders-table');
    }

    public function showCreateOrderForm(){
        return view('create-order');
    }

    public function createOrder(Request $request){
        $validation = $request->validate([
            'addressFrom' => ['required', 'string', 'max:255', 'min:5'],
            'addressTo' => ['required', 'string', 'max:255', 'min:5'],
            'name' => ['required', 'string', 'regex:/^[A-Za-z\s -_]+$/', 'max:255', 'min:2']
        ]);
    }
}
