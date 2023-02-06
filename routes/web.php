<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\typeRoomController;

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
    return view('pages.guest.home');
});

Route::get('/book-online', [typeRoomController::class, 'index']);

Route::get('/book-online/{room_type:id}', [typeRoomController::class, 'show']);
