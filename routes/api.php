<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\RoomImageController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('customers', CustomersController::class);
    Route::apiResource('bookings', BookingsController::class);
    Route::apiResource('rooms', RoomsController::class);
    Route::apiResource('images', ImageController::class);
    Route::get('/rooms/{room}/images', [RoomImageController::class, 'index']);

});
