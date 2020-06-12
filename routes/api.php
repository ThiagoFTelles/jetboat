<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'Api\UserController@details');

    Route::namespace('Api')->name('api.')->group(function () {
        Route::prefix('/vehicles')->group(function () {
            Route::get('/', 'VehiclesController@index')->name('index_vehicles');
            Route::get('/{uuid}', 'VehiclesController@show')->name('single_vehicle');
            Route::post('/', 'VehiclesController@store')->name('store_vehicle');
            Route::put('/{uuid}', 'VehiclesController@update')->name('update_vehicle');
            Route::delete('/{uuid}', 'VehiclesController@destroy')->name('delete_vehicle');
        });
    });
});




// Route::apiResource('vehicles', 'vehiclesController');
