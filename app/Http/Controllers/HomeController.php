<?php

namespace App\Http\Controllers;

use App\TaxiDriver;
use Illuminate\Http\Request;
use App\User;
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
        $taxiDriver = TaxiDriver::all();
        return view('dispatcher-dashboard', compact('taxiDriver'));
    }

    public function showAdmin()
    {
        return view('admin-dashboard');
    }
}
