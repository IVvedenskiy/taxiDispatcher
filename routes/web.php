<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders-table', 'OrdersController@showOrders')->name('orders-table');

Route::get('/admin-dashboard', 'HomeController@showAdmin')->name('admin-dashboard');

Route::get('/pdf', 'PDFController@getPdfPage')->name('pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/drivers-table', 'DriversController@showDrivers')->name('drivers-table');

Route::get('/create-order', 'OrdersController@showCreateOrderForm')->name('create-order');

Route::post('/create-order', 'OrdersController@createOrder')->name('create-order');

Route::get('/create-car', 'CarController@showCreateCarForm')->name('create-car');

Route::post('/create-car', 'CarController@create')->name('create-car');
