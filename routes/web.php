<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomViewController;
use App\Http\Controllers\ImageViewController;
use App\Http\Controllers\BookingViewController;
use App\Http\Controllers\CustomerViewController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource("/customersview", CustomerViewController::class);
Route::get('/customers/{customer}/edit', [CustomerViewController::class, 'edit'])->name('customersview.edit');
Route::resource("/bookingsview", BookingViewController::class);
Route::resource("/roomsview", RoomViewController::class);
Route::resource("/imagesview", ImageViewController::class);

