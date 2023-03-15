<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::All();
        $roomTypes = RoomType::all();

        return view('pages.admin.admin.manage-hotel.rooms.index', compact('rooms', 'roomTypes'));
    }

    public function edit(Room $room, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $room->room_number = $request->room_number;
        $room->save();

        return back();
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return back();
    }
}
