<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $room_types = RoomType::All();

        return view('pages.homepage.index', [
            'room_types' => $room_types,
        ]);
    }
}
