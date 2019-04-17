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
Auth::routes(['verify' => true]);

Route::get('/', 'PagesController@home');

Route::get('/marina', 'MarinasController@index')->middleware('verified');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'MarinasController@index')->name('home');

Route::get('/vehicles/{vehicle}/action', 'VehiclesController@actionMenu')->middleware('verified');
Route::patch('/vehicles/{vehicle}/action', 'VehiclesController@action')->middleware('verified');

Route::get('/vehicles/parked', 'VehiclesController@showParked')->middleware('verified');
Route::get('/vehicles/out', 'VehiclesController@showOut')->middleware('verified');
Route::get('/vehicles/navigating', 'VehiclesController@showNavigating')->middleware('verified');
Route::get('/vehicles/disused', 'VehiclesController@showDisused')->middleware('verified');
Route::resource('vehicles', 'VehiclesController')->middleware('verified');

Route::view('/qrcode', 'marinas.qrcode'); //leitor de QRcode
Route::view('/report', 'ActivityLogController@showReport');

Route::get('/vehicles/{vehicle}/generateqr', 'VehiclesController@generateQr')->middleware('verified'); //gera página html do qr code
Route::get('/vehicles/{vehicle}/generate-pdf','VehiclesController@generatePDF'); //gera pdf do qr code