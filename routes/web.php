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

Route::get('/listflight', 'FlightDetailController@showlistflight'
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
Route::get('/update/{id}','UserController@update')->name('update');
Route::post('/edit','UserController@edit')->name('edit');
Route::get('/flightdetail', function () {
    return view('flightdetail');
});
Route::get('/flightbook', function () {
    return view('flightbook');
});
Route::get('/listorg','OrgController@index')->name('listorg');
Route::get('/flightdetail/{id}','FlightDetailController@flight_detail')->name('flightdetail');
Route::get('/listairport','AirportController@index')->name('listairport');
Route::get('/createflight','FlightDetailController@createFlight')->name('createflight');
Route::post('/createflight','FlightDetailController@create_flight')->name('create-flight');