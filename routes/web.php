<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/',function () {
    if (auth()->check()) {
        return redirect()->route('expenses.index');
    }
    return view('welcome');
});

Route::redirect('home', 'expenses');
Route::get('expenses/report', 'ExpensesController@report')->name('expenses.report');
Route::get('expenses/report/custom-range', 'ExpensesController@customRangeReport')->name('expenses.report.custom');
Route::resource('expenses', 'ExpensesController')->except(['show']);

Route::view('faqs', 'faqs');