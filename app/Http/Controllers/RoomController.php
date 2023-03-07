<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::All();
        $roomTypes = RoomType::all();

        return view('pages.admin.admin.manage-hotel.rooms.index', compact('rooms', 'roomTypes'));
    }
}
