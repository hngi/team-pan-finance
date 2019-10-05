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
Route::resource('expenses', 'ExpensesController');
Route::resource('income', 'IncomeController');

Route::view('faqs', 'faqs');
Route::view('team', 'team');
Route::view('testimonials', 'testimonials');
Route::view('about', 'about');
Route::middleware('auth')->get('download-report', 'MiscellenousController@downloadReport')->name('expense.report.download');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();


Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
