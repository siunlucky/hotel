<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\BedTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComplementController;
use App\Http\Controllers\ChangePasswordController;


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

    Route::post('/booking/store', [RoomTypeController::class, 'store']);
    Route::get('/check-booking', [BookingController::class, 'check']);
    Route::get('/print-booking/{booking:id}', [BookingController::class, 'pdf']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'receptionist', 'middleware' => 'receptionist'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/booking-requests', [BookingController::class, 'request']);
        Route::get('/booking/approved', [BookingController::class, 'approved']);
        Route::get('/booking/cancelled-bookings', [BookingController::class, 'canceled']);
        Route::get('/booking/checked-out-booking', [BookingController::class, 'checkedOut']);
        Route::get('/booking/all-bookings', [BookingController::class, 'allBookings']);
        Route::get('/booking/booking-detail/{booking:id}', [BookingController::class, 'show']);

        Route::get('/book-room', [BookingController::class, 'create']);
        Route::get('/book-room/store', [BookingController::class, 'store']);

        Route::get('/booking/approving/{booking:id}', [BookingController::class, 'approving']);
        Route::get('/booking/check-in/{booking:id}', [BookingController::class, 'checkIn']);
        Route::get('/booking/check-out/{booking:id}', [BookingController::class, 'checkOut']);
        Route::get('/booking/canceling/{booking:id}', [BookingController::class, 'canceling']);


        Route::get('/profile', [ProfileController::class, 'index']);
        Route::post('/profile/{user:id}/update', [ProfileController::class, 'update']);

        Route::get('/changePassword', [ChangePasswordController::class, 'index']);
        Route::post('/changePassword/{user:id}/update', [ChangePasswordController::class, 'update']);
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/booking-requests', [BookingController::class, 'request']);
        Route::get('/booking/approved', [BookingController::class, 'approved']);
        Route::get('/booking/cancelled-bookings', [BookingController::class, 'canceled']);
        Route::get('/booking/checked-out-booking', [BookingController::class, 'checkedOut']);
        Route::get('/booking/all-bookings', [BookingController::class, 'allBookings']);
        Route::get('/booking/booking-detail/{booking:id}', [BookingController::class, 'show']);


        Route::get('/book-room', [BookingController::class, 'create']);
        Route::get('/book-room/store', [BookingController::class, 'store']);

        Route::get('/booking/approving/{booking:id}', [BookingController::class, 'approving']);
        Route::get('/booking/check-in/{booking:id}', [BookingController::class, 'checkIn']);
        Route::get('/booking/check-out/{booking:id}', [BookingController::class, 'checkOut']);
        Route::get('/booking/canceling/{booking:id}', [BookingController::class, 'canceling']);

        Route::get('/receptionist', [UserController::class, 'index']);
        Route::post('/receptionist/store', [UserController::class, 'create']);
        Route::post('/receptionist/{user:id}/edit', [UserController::class, 'edit']);
        Route::delete('/receptionist/{user:id}/delete', [UserController::class, 'destroy']);

        Route::get('/amenities', [AmenityController::class, 'index']);
        Route::post('/amenities/store', [AmenityController::class, 'create']);
        Route::post('/amenities/{amenity:id}/edit', [AmenityController::class, 'edit']);
        Route::delete('/amenities/{amenity:id}/delete', [AmenityController::class, 'destroy']);

        Route::get('/complements', [ComplementController::class, 'index']);
        Route::post('/complements/store', [ComplementController::class, 'create']);
        Route::post('/complements/{complement:id}/edit', [ComplementController::class, 'edit']);
        Route::delete('/complements/{complement:id}/delete', [ComplementController::class, 'destroy']);

        Route::get('/bed-list', [BedTypeController::class, 'index']);
        Route::post('/bed/store', [BedTypeController::class, 'create']);
        Route::post('/bed/{bed:id}/edit', [BedTypeController::class, 'edit']);
        Route::delete('/bed/{bed:id}/delete', [BedTypeController::class, 'destroy']);

        Route::get('/rooms', [RoomController::class, 'index']);
        Route::post('/rooms/edit/{room:id}', [RoomController::class, 'edit']);
        Route::delete('/rooms/delete/{room:id}', [RoomController::class, 'destroy']);

        Route::get('/room-types', [RoomTypeController::class, 'adminIndex']);
        Route::get('/room-types/create', [RoomTypeController::class, 'adminCreate']);
        Route::post('/room-types/create/store', [RoomTypeController::class, 'adminStore']);
        Route::get('/room-types/edit/{room_type:id}', [RoomTypeController::class, 'adminEdit']);
        Route::delete('/room-types/delete/{room_type:id}', [RoomTypeController::class, 'adminDestroy']);

        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/password', [PasswordController::class, 'index']);
    });
});


Route::get('/book-online/{room_type:id}', [typeRoomController::class, 'show']);

Route::get('/book-online/{room_type:id}/form', [BookingController::class, 'form']);

Route::get('/book-online/{room_type:id}/form/select-room', [BookingController::class, 'selectRoom']);

Route::get('/receptionist/dashboard', [DashboardController::class, 'index']);
