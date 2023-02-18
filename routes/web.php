<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\DashboardController;


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

Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HomepageController::class, 'index']);

    Route::get('/type-room', [RoomTypeController::class, 'index']);
    Route::get('/type-room/detail/{room_type:id}', [RoomTypeController::class, 'show']);


    Route::group(['prefix' => 'receptionist'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/booking-requests', [BookingController::class, 'request']);
        Route::get('/booking/approved', [BookingController::class, 'approved']);
        Route::get('/booking/cancelled-bookings', [BookingController::class, 'cancelled']);
        Route::get('/booking/checked-out-booking', [BookingController::class, 'checkedOut']);
        Route::get('/booking/all-bookings', [BookingController::class, 'allBookings']);

        Route::get('/book-room', [BookingController::class, 'create']);
    });
});


Route::get('/book-online/{room_type:id}', [typeRoomController::class, 'show']);

Route::get('/book-online/{room_type:id}/form', [BookingController::class, 'form']);

Route::get('/book-online/{room_type:id}/form/select-room', [BookingController::class, 'selectRoom']);

Route::get('/receptionist/dashboard', [DashboardController::class, 'index']);
