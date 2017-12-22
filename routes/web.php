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

// following path
Route::post('/following/add_follow', 'FollowingController@add_follow');

// user paths
Route::get('/dashboard', 'UsersController@show')->name('dashboard');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/{user}', 'UsersController@view');

// stocks paths
Route::get('/stocks', 'StocksController@index');
Route::post('/stocks', 'StocksController@search');
Route::get('/stocks/{stock}', 'StocksController@show');

// portfolio paths
Route::post('/portfolio/add_stock', 'PortfolioController@add_stock');
Route::delete('/portfolio/remove_stock', 'PortfolioController@remove_stock');
