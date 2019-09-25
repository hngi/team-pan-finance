<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/','welcome');
Route::get('/home', 'HomeController@index')->name('home');
