<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
//admin
Route::get('/admin-orders', 'HomeController@showOrders')->name('admin-orders');

Route::get('/admin-drivers', 'HomeController@showDrivers')->name('admin-drivers');

Route::get('/admin-clients', 'HomeController@showClients')->name('admin-clients');

Route::get('/admin-cars', 'HomeController@showCars')->name('admin-cars');

Route::get('/admin-medInspections', 'HomeController@showMedInspections')->name('admin-medInspections');

Route::get('/admin-techInspections', 'HomeController@showTechInspections')->name('admin-techInspections');

Route::get('/admin-driversWorkingDays', 'HomeController@showDriverWorkingDays')->name('admin-driversWorkingDays');

Route::get('/admin-holidays', 'HomeController@showHolidays')->name('admin-holidays');

Route::get('/admin-map', 'HomeController@showMap')->name('admin-map');

Route::get('/admin-report', 'ReportController@showReportFormAdmin')->name('admin-report');

Route::post('/admin-report', 'ReportController@createReport')->name('admin-report');
//report
Route::get('/report', 'ReportController@showReportForm')->name('report');

Route::post('/report', 'ReportController@createReport')->name('report');

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
//driverWorkingDays
Route::get('/create-driversWorkingDays', 'DriverWorkingDaysController@showCreateDriverWorkingDaysForm')->name('create-driversWorkingDays');

Route::post('/create-driversWorkingDays', 'DriverWorkingDaysController@create')->name('create-driversWorkingDays');

Route::get('/driversWorkingDays-table', 'DriverWorkingDaysController@showDriverWorkingDays')->name('driversWorkingDays-table');
//medInspections
Route::get('/create-medInspections', 'MedInspectionsController@showCreateMedInspectionsForm')->name('create-medInspections');

Route::post('/create-medInspections', 'MedInspectionsController@create')->name('create-medInspections');

Route::get('/medInspections-table', 'MedInspectionsController@showMedInspections')->name('medInspections-table');
//techInspections
Route::get('/create-techInspections', 'TechInspectionsController@showCreateTechInspectionsForm')->name('create-techInspections');

Route::post('/create-techInspections', 'TechInspectionsController@create')->name('create-techInspections');

Route::get('/techInspections-table', 'TechInspectionsController@showTechInspections')->name('techInspections-table');
//map
Route::get('/map', 'MapController@showMap')->name('map');
//statistic
Route::get('/statistic', 'DriversController@showStatisticForDriver')->name('statistic');
