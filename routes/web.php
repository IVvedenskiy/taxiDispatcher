<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/firstWorkPage', 'HomeController@goWork')->name('firstWorkPage');

Route::get('/pdf', 'PDFController@getPdfPage')->name('pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
// только для админа
    echo "Hello Admin kek2";
});
