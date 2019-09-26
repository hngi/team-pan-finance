<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/','welcome');
Route::get('expenses/report', 'ExpensesController@report')->name('expenses.report');
Route::get('expenses/report/custom-range', 'ExpensesController@customRangeReport')->name('expenses.report.custom');
Route::resource('expenses', 'ExpensesController');
