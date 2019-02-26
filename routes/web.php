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

// Route::get('/', function () {
//     return view('welcome');
// });
//url index
// Route::get('/',[
//     'as' => 'index',
//     'uses' => 'IndexController@index'
// ]);
// Route::get('/',[
//     'as' => 'index',
//     'uses' => 'IndexController@showCityList'
// ]);
// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/','IndexController@index')->name('index');
Route::get('/register','UserController@create')->name('create');
Route::post('/register','UserController@createuser')->name('create-user');

Route::get('/listflight', 'FlightListController@showlistflight'
)->name('listflight');
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@checklogin')->name('checklogin');
Route::get('/test',[
    'as' => 'users',
    'uses' => 'UserController@show'
]);
Route::get('/logout','UserController@logout')->name('logout');
Route::get('detail', function () {
    return view('detail');
});