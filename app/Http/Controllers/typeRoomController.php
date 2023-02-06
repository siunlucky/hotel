<?php

namespace App\Http\Controllers;

use App\Models\Room_Beds;
use App\Models\Amenities;
use App\Models\Room_Type;
use Illuminate\Http\Request;
use App\Models\Room_Amenities;

class typeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.guest.room_type', [
            'type_rooms' => Room_Type::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room_Type $room_type)
    {

        $room_amenities = Room_Amenities::All();
        $filtered = $room_amenities->where('id_room_type', $room_type->id);
        $room_amenities = $filtered->all();

        $room_beds = Room_Beds::All();
        $filtered = $room_beds->where('id_room_type', $room_type->id);
        $room_beds = $filtered->all();

        return view('pages.guest.room_type_detail', [

            'room_type' => $room_type,
            'room_amenities' => $room_amenities,
            'room_beds' => $room_beds,
            'amenities' => Amenities::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
