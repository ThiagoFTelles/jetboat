<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->name('api.')->group(function () {
    Route::prefix('/vehicles')->group(function () {
        Route::get('/', 'VehiclesController@index')->name('vehicles');
        Route::get('/{uuid}', 'VehiclesController@show')->name('vehicle');
    });
});

// Route::get('/ok', function () {
//     return ['status' => true];
// });

// Route::apiResource('vehicles', 'vehiclesController');
