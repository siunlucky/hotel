<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <section class="p-10 mx-20 my-5">
        <div class="p-5 border-2 rounded-lg">
            <div class="flex items-center justify-between pb-2 border-b-2">
                <div class="">
                    <h1 class="text-[20px] font-semibold">{{ $booking->booking_number }}</h1>
                    <h1 class="text-sm font-normal">{{ date('d M Y', strtotime($booking->created_at)); }}</h1>
                </div>
                <div class="flex">

                    @if ($booking->booking_status == 'requested')
                    <div class="p-2 px-4 bg-yellow-400 rounded-lg">
                        <h1 class="text-white">Requested</h1>
                    </div>
                    @elseif ($booking->booking_status == 'approved')
                    <div class="p-2 px-4 bg-green-400 rounded-lg">
                        <h1 class="text-white">Approved</h1>
                    </div>
                    @elseif ($booking->booking_status == 'check_in')
                    <div class="p-2 px-4 bg-blue-500 rounded-lg">
                        <h1 class="text-white">Check In</h1>
                    </div>
                    @elseif ($booking->booking_status == 'check_out')
                    <div class="p-2 px-4 bg-gray-500 rounded-lg">
                        <h1 class="text-white">Check Out</h1>
                    </div>
                    @elseif ($booking->booking_status == 'cancelled')
                    <div class="p-2 px-4 bg-red-500 rounded-lg">
                        <h1 class="text-white">Cancelled</h1>
                    </div>
                    @endif

                </div>

            </div>

            <div class="grid grid-cols-2 mt-5">
                <div class="grid grid-cols-3 gap-2">
                    <h1 class="col-span-1 font-normal">Number Booking</h1>
                    <span class="col-span-2 font-semibold">{{ $booking->booking_number }}</span>

                    <h1 class="col-span-1 font-normal">Name</h1>
                    <span class="col-span-2 font-semibold">{{ $booking->booking_name }}</span>

                    <h1 class="col-span-1 font-normal">Email</h1>
                    <span class="col-span-2 font-semibold">{{ $booking->booking_email }}</span>

                    <h1 class="col-span-1 font-normal">Phone</h1>
                    <span class="col-span-2 font-semibold">{{ $booking->booking_phone }}</span>

                </div>
                <div class="grid grid-cols-3 gap-2">
                    <h1 class="col-span-1 font-normal">Check In Date</h1>
                    <span class="col-span-2 font-semibold">{{ date('D, d M Y', strtotime($booking->check_in_date)); }}</span>

                    <h1 class="col-span-1 font-normal">Check Out Date</h1>
                    <span class="col-span-2 font-semibold">{{ date('D, d M Y', strtotime($booking->check_out_date)); }}</span>

                    <h1 class="col-span-1 font-normal">Status</h1>
                    <span class="col-span-2 font-semibold">
                        @if ($booking->booking_status == 'requested')
                        Requested
                        @elseif ($booking->booking_status == 'approved')
                        Approved
                        @elseif ($booking->booking_status == 'check_in')
                        Check In
                        @elseif ($booking->booking_status == 'check_out')
                        Check Out
                        @elseif ($booking->booking_status == 'cancelled')
                        Cancelled
                        @endif
                    </span>

                    <h1 class="col-span-1 font-normal">Total Room</h1>
                    <span class="col-span-2 font-semibold">{{ $booking->total_room }}</span>
                </div>

                <div class="grid grid-cols-2 col-span-2 gap-2 pt-5 my-5 border-t-2">
                    @foreach ($booking->bookingDetails as $room)
                    <div class="">
                        <h1 class="text-[18px] font-semibold">Room {{ $room->room->room_number }}</h1>
                        <h1 class="text-sm font-normal">{{ date('D, d M Y', strtotime($booking->check_in_date)); }}</h1>
                    </div>
                    @endforeach
                </div>

                <div class="col-span-2 pt-5 border-t-2">
                    <h1 class="font-semibold">Detail Payment</h1>
                    <div class="grid grid-cols-5 col-span-2 gap-2 my-5">
                        <h1 class="col-span-1 font-normal">Total Room</h1>
                        <span class="col-span-4 font-semibold text-right">{{ $booking->total_room }}</span>

                        <h1 class="col-span-1 font-normal">Price / Room</h1>
                        <span class="col-span-4 font-semibold text-right">$ {{ $booking->RoomType->price }}.00</span>

                        <h1 class="col-span-1 font-normal">Days</h1>
                        <span class="col-span-4 font-semibold text-right">{{ \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date); }}</span>

                    </div>
                    <div class="grid grid-cols-5 col-span-2 gap-2 pt-5 my-5 border-t-2">
                        <h1 class="col-span-1 text-[18px] font-semibold">Total Price</h1>
                        <span class="col-span-4 text-[18px] font-bold text-right">$ {{ $booking->RoomType->price * $booking->total_room *
                            \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                            }}.00</span>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
