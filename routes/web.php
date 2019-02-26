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
    return view('welcome');
});
//url index
Route::get('/index',[
    'as' => 'index',
    'uses' => 'IndexController@index'
]);
Route::get('/index',[
    'as' => 'index',
    'uses' => 'IndexController@showCityList'
]);
Route::get('/register', function () {
    return view('register');
});
Route::get('/listflight', 'FlightListController@showlistflight'
)->name('listflight');