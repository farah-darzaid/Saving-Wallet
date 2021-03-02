<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@redirect');

Auth::routes();

Route::get('/home', 'HomeController@getDashboard');

//Manage user routes
Route::prefix('user')->middleware(['auth','user'])->group(function () { // add user middleware
    Route::get('/','UserController@index');
    Route::get('/add-transaction','UserController@addTransactionPage');
    Route::get('/my-transaction','UserController@myTransactionPage');
    Route::post('/add-transaction','UserController@addTransaction');
    Route::get('/select-transaction','UserController@selectTransaction')->name('select-transaction');

});

//Manage admin routes
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/','AdminController@index');
});

