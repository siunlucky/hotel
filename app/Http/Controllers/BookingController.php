<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request()
    {
        $bookings = Booking::where('booking_status', 'requested')->get();
        return view('pages.admin.receptionist.booking.index', [
            'bookings' => $bookings,
            'table' => 'All Booking Request'
        ]);
    }

    public function approved()
    {
        $bookings = Booking::where('booking_status', 'approved')->orWhere('booking_status', 'check_in')->get();
        return view('pages.admin.receptionist.booking.index', [
            'bookings' => $bookings,
            'table' => 'Upcoming and Running'
        ]);
    }

    public function checkedOut()
    {
        $bookings = Booking::where('booking_status', 'check_out')->get();
        return view('pages.admin.receptionist.booking.index', [
            'bookings' => $bookings,
            'table' => 'Checked Out'
        ]);
    }

    public function cancelled()
    {
        $bookings = Booking::where('booking_status', 'cancelled')->get();
        return view('pages.admin.receptionist.booking.index', [
            'bookings' => $bookings,
            'table' => 'Cancelled Bookings'
        ]);
    }

    public function allBookings()
    {
        $bookings = Booking::whereNotIn('booking_status', ['requested'])->get();
        return view('pages.admin.receptionist.booking.index', [
            'bookings' => $bookings,
            'table' => 'All Bookings'
        ]);
    }

    // public function form(Request $request)
    // {
    //     $data = [
    //         $room_type = $request->room_type,
    //         $check_in_date = $request->check_in_date,
    //         $check_out_date = $request->check_out_date,
    //         $total_room = $request->total_room
    //     ];
    //     return view('pages.guest.form')->with('data', $data);
    // }

    // public function selectRoom(Request $request)
    // {


    //     return view('pages.guest.select-room');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $room_types = RoomType::All();
        return view('pages.admin.receptionist.booking.create', [
            'room_types' => $room_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
