<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});


//registration paths
Route::get('/register', 'RegistrationsController@create');

Route::post('/register', 'RegistrationsController@store');

// session paths
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


// user paths
Route::get('/dashboard', 'UsersController@show')->name('dashboard');


// stocks paths
Route::get('/stocks', 'StocksController@index');
Route::get('/stocks/{stock}', 'StocksController@show');

// portfolio paths
Route::post('/portfolio/add_stock', 'PortfolioController@add_stock');
