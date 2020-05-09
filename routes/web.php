<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dispatcher-dashboard', 'HomeController@showDispatcher')->name('dispatcher-dashboard');

Route::get('/admin-dashboard', 'HomeController@showAdmin')->name('admin-dashboard');

Route::get('/pdf', 'PDFController@getPdfPage')->name('pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
