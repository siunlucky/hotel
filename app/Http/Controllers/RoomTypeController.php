<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Bed;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\Booking;
use App\Models\RoomBed;
use App\Models\RoomType;
use App\Models\Complement;
use App\Models\RoomAmenity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Models\PhotoRoomType;
use App\Models\RoomComplement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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

    public function show(RoomType $room_type, Request $request)
    {

        $amenities = $room_type->amenities;
        $beds = $room_type->beds;
        $complements = $room_type->complements;
        $photos = $room_type->PhotoRoomTypes;

        if ($request->check_in_date && $request->check_out_date && $request->total_room) {
            $startDate = Carbon::createFromFormat('m/d/Y', $request->check_in_date);
            $endDate = Carbon::createFromFormat('m/d/Y', $request->check_out_date);

            $dates = [];
            $currentDate = $startDate;
            $room_type_id = $room_type->id;

            $rooms = RoomType::findOrFail($room_type_id)->rooms;

            while ($currentDate <= $endDate) {
                $dates[] = $currentDate->format('d M, Y');
                $currentDate->addDay();
            }
            $totalRoom = $request->total_room;
            $selectedRooms = [];
        } else {
            $selectedRooms = null;
            $dates = null;
            $rooms = null;
            $startDate = null;
            $endDate = null;
            $totalRoom = null;
        }

        return view('pages.room-type.show',  compact('room_type', 'amenities', 'beds', 'complements', 'dates', 'rooms',  'photos', 'selectedRooms', 'startDate', 'endDate', 'totalRoom'));
    }

    public function store(Request $request)
    {
        function generateUniqueNumber()
        {
            do {
                $number = mt_rand(10000000, 99999999);
            } while (Booking::where('booking_number', $number)->exists());
            return $number;
        }

        $validator = Validator::make($request->all(), [
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'total_room' => 'required|integer',
            'booking_name' => 'required',
            'booking_email' => 'required|email',
            'booking_phone' => 'required|min:12',
            'room_type_id' => 'required',
            'rooms' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $room_type_id = $request->room_type_id;

        $roomType = RoomType::where('id', $room_type_id)->first();

        $booking_number = generateUniqueNumber();

        $startDate = Carbon::createFromFormat('m/d/Y', $request->check_in_date);
        $endDate = Carbon::createFromFormat('m/d/Y', $request->check_out_date);

        $booking = new Booking();

        $booking->booking_number = $booking_number;
        $booking->booking_name = $request->booking_name;
        $booking->booking_email = $request->booking_email;
        $booking->booking_phone = $request->booking_phone;
        $booking->check_in_date = $startDate;
        $booking->check_out_date = $endDate;
        $booking->total_room = $request->total_room;
        $booking->room_type_id = $request->room_type_id;
        $booking->booking_status = 'requested';
        $booking->user_id = null;

        $booking->save();


        $interval = $startDate->diff($endDate);
        $days = $interval->days;

        $price = $roomType->price * $days;

        for ($i = 0; $i < $request->total_room; $i++) {
            $booking_detail = new BookingDetail();
            $booking_detail->booking_id = $booking->id;
            $booking_detail->room_id = $request->rooms[$i];
            $booking_detail->access_date = null;
            $booking_detail->price = $price;

            $booking_detail->save();
        }
        return back();
    }




    public function adminIndex()
    {
        $room_types = RoomType::All();

        return view('pages.admin.admin.manage-hotel.room-types.index', [
            'room_types' => $room_types,
        ]);
    }

    public function adminCreate()
    {
        $room_types = RoomType::All();
        $complements = Complement::all();
        $amenities = Amenity::all();
        $beds = Bed::all();


        return view('pages.admin.admin.manage-hotel.room-types.create', compact('room_types', 'complements', 'amenities', 'beds'));
    }

    public function adminStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'person' => 'required',
            'price' => 'required',
            'amenities' => 'required',
            'complements' => 'required',
            'rooms' => 'required',
            'beds' => 'required',
            'photos' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $roomType = new RoomType();

        $roomType->name = $request->name;
        $roomType->price = $request->price;
        $roomType->description = $request->description;
        $roomType->person = $request->person;

        $roomType->save();

        $photos = $request->photos;
        foreach ($photos as $data) {
            $filename = Str::random(40) . '.' . $data->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('typeRoomPhoto', $data, $filename);

            $photoRoomType = new PhotoRoomType();
            $photoRoomType->room_type_id = $roomType->id;
            $photoRoomType->photo = $filename;
            $photoRoomType->save();
        }

        $rooms = $request->rooms;
        foreach ($rooms as $data) {
            $room = new Room();
            $room->room_number = $data;
            $room->room_type_id = $roomType->id;
            $room->save();
        }

        $amenities = $request->amenities;
        foreach ($amenities as $data) {
            $roomAmenity = new RoomAmenity();
            $roomAmenity->room_type_id = $roomType->id;
            $roomAmenity->amenity_id = $data;
            $roomAmenity->save();
        }

        $complements = $request->complements;
        foreach ($complements as $data) {
            $roomComplement = new RoomComplement();
            $roomComplement->room_type_id = $roomType->id;
            $roomComplement->complement_id = $data;
            $roomComplement->save();
        }

        $beds = $request->beds;
        foreach ($beds as $data) {
            $roomBed = new RoomBed();
            $roomBed->room_type_id = $roomType->id;
            $roomBed->bed_id = $data;
            $roomBed->save();
        }



        return redirect()->intended('/hotel/admin/room-types');
    }

    public function adminEdit(RoomType $room_type)
    {
        $complements = Complement::all();
        $amenities = Amenity::all();
        $beds = Bed::all();
        $photos = $room_type->PhotoRoomTypes;

        return view('pages.admin.admin.manage-hotel.room-types.edit', compact('room_type', 'complements', 'amenities', 'beds', 'photos'));
    }


    public function adminDestroy(RoomType $room_type)
    {
        $room_type->delete();
        return back();
    }
}
