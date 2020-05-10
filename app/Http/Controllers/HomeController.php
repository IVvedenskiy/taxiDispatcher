<?php

namespace App\Http\Controllers;

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

    public function showAdmin()
    {
        return view('admin-dashboard');
    }
}
