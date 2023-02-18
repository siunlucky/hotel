<?php

namespace App\Http\Controllers;


use App\Models\RoomType;
use Illuminate\Http\Request;


class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = RoomType::All();

        return view('pages.room-type.index', [
            'room_types' => $room_types,
        ]);
    }

    public function show(RoomType $room_type)
    {

        $amenities = $room_type->amenities;
        $beds = $room_type->beds;
        $complements = $room_type->complements;

        return view('pages.room-type.show', [
            'room_type' => $room_type,
            'amenities' => $amenities,
            'beds' => $beds,
            'complements' => $complements,
        ]);
    }

    // public function home()
    // {
    //     $type_rooms = Room_Type::orderBy('updated_at', 'desc')->limit(6)->get();

    //     return view('pages.guest.home', [
    //         'type_rooms' => $type_rooms,
    //         'room_amenities' => Room_Amenities::All(),
    //     ]);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */


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
