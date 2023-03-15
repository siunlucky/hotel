<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use Illuminate\Support\Facades\Validator;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request(Request $request)
    {

        $query = Booking::where('booking_status', 'requested');

        if ($request->booking_search) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_name', 'like', '%' . $request->booking_search . '%')
                    ->orWhere('booking_number', 'like', '%' . $request->booking_search . '%');
            });
        }

        $bookings = $query->get();

        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.index', [
                'bookings' => $bookings,
                'table' => 'All Booking Request'
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.index',  [
                'bookings' => $bookings,
                'table' => 'All Booking Request'
            ]);
        }
    }

    public function approved(Request $request)
    {
        $query = Booking::where('booking_status', 'approved')->orWhere('booking_status', 'check_in');

        if ($request->booking_search) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_name', 'like', '%' . $request->booking_search . '%')
                    ->orWhere('booking_number', 'like', '%' . $request->booking_search . '%');
            });
        }

        if ($request->check_in_date) {
            $query->where('check_in_date', '=', $request->check_in_date);
        }

        $bookings = $query->get();

        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.index', [
                'bookings' => $bookings,
                'table' => 'Upcoming and Running'
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.index',  [
                'bookings' => $bookings,
                'table' => 'Upcoming and Running'
            ]);
        }
    }

    public function checkedOut(Request $request)
    {
        $query = Booking::where('booking_status', ['check_out']);

        if ($request->booking_search) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_name', 'like', '%' . $request->booking_search . '%')
                    ->orWhere('booking_number', 'like', '%' . $request->booking_search . '%');
            });
        }

        if ($request->check_in_date) {
            $query->where('check_in_date', '=', $request->check_in_date);
        }

        $bookings = $query->get();

        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.index', [
                'bookings' => $bookings,
                'table' => 'Checked Out'
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.index',  [
                'bookings' => $bookings,
                'table' => 'Checked Out'
            ]);
        }
    }

    public function canceled(Request $request)
    {
        $query = Booking::where('booking_status', ['cancelled']);

        if ($request->booking_search) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_name', 'like', '%' . $request->booking_search . '%')
                    ->orWhere('booking_number', 'like', '%' . $request->booking_search . '%');
            });
        }

        if ($request->check_in_date) {
            $query->where('check_in_date', '=', $request->check_in_date);
        }

        $bookings = $query->get();

        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.index', [
                'bookings' => $bookings,
                'table' => 'Cancelled Bookings'
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.index',  [
                'bookings' => $bookings,
                'table' => 'Cancelled Bookings'
            ]);
        }
    }

    public function allBookings(Request $request)
    {
        $query = Booking::whereNotIn('booking_status', ['requested']);

        if ($request->booking_search) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_name', 'like', '%' . $request->booking_search . '%')
                    ->orWhere('booking_number', 'like', '%' . $request->booking_search . '%');
            });
        }

        if ($request->check_in_date) {
            $query->where('check_in_date', '=', $request->check_in_date);
        }

        $bookings = $query->get();

        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.index', [
                'bookings' => $bookings,
                'table' => 'All Bookings'
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.index',  [
                'bookings' => $bookings,
                'table' => 'All Bookings'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $room_types = RoomType::All();

        $dateRange = $request->input('date_range');
        $roomType = $request->input('room_type');
        $manyRooms = $request->input('many_rooms');
        if ($dateRange && $roomType && $manyRooms) {
            $dateParts = explode(' to ', $dateRange);

            $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0]);
            $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1]);

            $dates = [];
            $currentDate = $startDate;
            $room_type_id = $request->input('room_type');


            // Retrieve all rooms of the selected type
            $rooms = RoomType::findOrFail($room_type_id)->rooms;

            // Loop through the rooms and check availability for the selected date range
            // foreach ($rooms as $room) {
            //     $is_available = $room->isAvailable($startDate, $endDate);
            //     $room->color = $is_available ? 'bg-[#4634FF]' : 'bg-[#EA5455]';
            //     $room->disabled = !$is_available;
            // }

            while ($currentDate <= $endDate) {
                $dates[] = $currentDate->format('d M, Y');
                $currentDate->addDay();
            }


            $selectedRooms = [];
        } else {
            $dates = [];
            $available_rooms = [];
            $rooms = [];
            $manyRooms = null;
            $startDate = null;
            $endDate = null;
            $selectedRooms = [];
        }
        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.create',  compact('dateRange', 'roomType', 'dates', 'room_types', 'rooms', 'manyRooms', 'startDate', 'endDate', 'selectedRooms'));
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.create',  compact('dateRange', 'roomType', 'dates', 'room_types', 'rooms', 'manyRooms', 'startDate', 'endDate', 'selectedRooms'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
            'booking_name' => 'required',
            'booking_email' => 'required|email',
            'booking_phone' => 'required|min:12',
            'date_range' => 'required',
            'total_room' => 'required|integer',
            'room_type' => 'required',
            'rooms' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $room_type_id = $request->room_type;

        $roomType = RoomType::where('id', $room_type_id)->first();



        $booking_number = generateUniqueNumber();
        $dateRange = $request->date_range;
        $dateParts = explode(' to ', $dateRange);

        $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0]);
        $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1]);

        $booking = new Booking();

        $booking->booking_number = $booking_number;
        $booking->booking_name = $request->booking_name;
        $booking->booking_email = $request->booking_email;
        $booking->booking_phone = $request->booking_phone;
        $booking->check_in_date = $startDate;
        $booking->check_out_date = $endDate;
        $booking->total_room = $request->total_room;
        $booking->room_type_id = $request->room_type;
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

    public function approving(Booking $booking)
    {
        $booking->booking_status = 'approved';
        $booking->user_id = auth()->user()->id;
        $booking->save();
        return back();
    }

    public function checkIn(Booking $booking)
    {
        $booking->booking_status = 'check_in';
        $booking->save();
        return back();
    }

    public function checkOut(Booking $booking)
    {
        $booking->booking_status = 'check_out';
        $booking->save();
        return back();
    }

    public function canceling(Booking $booking)
    {
        if ($booking->booking_status == 'requested') {
            $booking->user_id = auth()->user()->id;
        }
        $booking->booking_status = 'cancelled';
        $booking->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {

        $start_date = $booking->check_in_date;
        $end_date = $booking->check_out_date;

        // Convert dates to Carbon instances
        $start = \Carbon\Carbon::parse($start_date);
        $end = \Carbon\Carbon::parse($end_date);

        // Create an array of dates between start and end dates
        $dates = [];

        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('d M, Y');
        }

        $booking_details = $booking->bookingDetails;

        // Pass the dates array to the view
        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.booking.show',  compact('booking', 'booking_details', 'dates'));
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.booking.show',  compact('booking', 'booking_details', 'dates'));
        }
    }
    public function check(Booking $booking, Request $request)
    {
        $search = $request->search;
        if ($search) {
            $booking = Booking::where('booking_number', 'LIKE', $search)->first();
        } else {
            $booking = [];
        }

        return view('pages.check-booking.index', compact('booking', 'search'));
    }

    public function invoice(Booking $booking)
    {

        $data = [
            'booking_number'    => $booking->booking_name,
            'booking_name'    => $booking->booking_name,
            'booking_email'         => $booking->booking_email,
            'booking_phone'      => $booking->booking_phone,
            'check_in_date' => $booking->check_in_date,
            'check_out_date'        => $booking->check_out_date,
            'total_room' => $booking->total_room,
            'room_type' => $booking->roomType->name,
            'booking_status' => $booking->booking_status,
            'created_at' => $booking->created_at,
            'rooms' => $booking->bookingDetails,
            'price' => $booking->roomType->price

        ];
        // $pdf = PDF::loadView('pages.check-booking.invoice', $data);
        // return $pdf->stream('invoice.pdf');
        return view('pages.check-booking.invoice', $data);
    }

    public function pdf(Booking $booking)
    {
        $customer = new Buyer([
            'name'          => $booking->booking_name,
            'phone'         => $booking->booking_phone,
            'custom_fields' => [
                'Email' => $booking->booking_email,
                'Booking Number' => ">> " . $booking->booking_number . " <<",
                'Check In' => date('D, d M Y', strtotime($booking->check_in_date)),
                'Check Out' => date('D, d M Y', strtotime($booking->check_out_date)),
            ],
        ]);


        $client = new Party([
            'name' => "HOTEL",
            'phone' => "+62 821-4132-6576",
            'custom_fields' => [
                'email' => "faizelfahad2@gmail.com",
            ],
        ]);



        foreach ($booking->bookingDetails as $detail_booking) {
            $items[] =
                (new InvoiceItem())
                ->title("Room - " . $detail_booking->room->room_number)
                ->description($booking->roomType->name)
                ->pricePerUnit($booking->roomType->price)
                ->units('/Night')
                ->quantity(Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date));
        }

        $invoice = Invoice::make()
            ->status($booking->booking_status)
            ->date($booking->created_at)
            ->dateFormat('d/m/Y')
            ->seller($client)
            ->buyer($customer)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->addItems($items);

        return $invoice->stream();
    }
}
