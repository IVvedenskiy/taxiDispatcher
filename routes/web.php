<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-dashboard', 'HomeController@showAdmin')->name('admin-dashboard');

Route::get('/pdf', 'PDFController@getPdfPage')->name('pdf');

Auth::routes();
//orders
Route::get('/orders-table', 'OrdersController@showOrders')->name('orders-table');

Route::get('/create-order', 'OrdersController@showCreateOrderForm')->name('create-order');

Route::post('/create-order', 'OrdersController@createOrder')->name('create-order');
//drivers
Route::get('/drivers-table', 'DriversController@showDrivers')->name('drivers-table');

Route::get('/create-driver', 'DriversController@showCreateDriverForm')->name('create-driver');

Route::post('/create-driver', 'DriversController@create')->name('create-driver');
//cars
Route::get('/create-car', 'CarController@showCreateCarForm')->name('create-car');

Route::post('/create-car', 'CarController@create')->name('create-car');

Route::get('/cars-table', 'CarController@showCars')->name('cars-table');
//clients
Route::get('/create-client', 'ClientsController@showCreateClientForm')->name('create-client');

Route::post('/create-client', 'ClientsController@create')->name('create-client');

Route::get('/clients-table', 'ClientsController@showClients')->name('clients-table');
//holiday
Route::get('/create-holiday', 'HolidaysController@showCreateHolidayForm')->name('create-holiday');

Route::post('/create-holiday', 'HolidaysController@create')->name('create-holiday');

Route::get('/holidays-table', 'HolidaysController@showHolidays')->name('holidays-table');
