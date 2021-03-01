<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/home');
    }else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@getDashboard');

//Manage user routes
Route::prefix('user')->group(function () { // add user middleware
    Route::get('/add-transaction','UserController@addTransactionPage');
    Route::get('/my-transaction','UserController@myTransactionPage');
    Route::post('/add-transaction','UserController@addTransaction');

});
