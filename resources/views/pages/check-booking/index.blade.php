@extends('layouts.main')

@section('pages')
    <section class="z-20 bg-center bg-no-repeat bg-cover bg-room_type">
        <div class="p-16 text-center">
            <h1 class="text-white text-[33px] font-bold">Check Booking</h1>
        </div>
    </section>
    <section class="my-10">
        <div class="mx-[550px] text-black">
            <form>
                <div class="flex flex-col">
                    <label for="search" class="">Booking Number</label>
                    <input type="text" name="search" class="border mt-2 border-[#00000080] rounded-[10px] p-3.5"
                        placeholder="012345678" value="{{ request('search') }}">
                    <button type="submit" class="my-5 btn btn-primary">
                        Search</button>
                </div>
            </form>
        </div>
    </section>
    @if (isset($search))
    @if ($booking)
    <section class="p-10 mx-20 my-5">
        <div class="p-5 border-2 rounded-lg">
            <div class="flex items-center justify-between pb-2 border-b-2">
                <div class="">
                    <h1 class="text-[20px] font-semibold">{{ $booking->roomType->name }}</h1>
                    <h1 class="text-sm font-normal">8, June 2023</h1>
                </div>
                <div class="flex">

                    <a href="/hotel/print-booking/{{ $booking->id }}" class="mr-5 bg-[#00C500] items-center flex p-2 px-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                        <span class="ml-2 text-white">Print</span>
                    </a>
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
                        <span class="col-span-4 font-semibold text-right">$ {{ $booking->roomType->price }}.00</span>

                        <h1 class="col-span-1 font-normal">Days</h1>
                        <span class="col-span-4 font-semibold text-right">{{ \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date); }}</span>

                    </div>
                    <div class="grid grid-cols-5 col-span-2 gap-2 pt-5 my-5 border-t-2">
                        <h1 class="col-span-1 text-[18px] font-semibold">Total Price</h1>
                        <span class="col-span-4 text-[18px] font-bold text-right">$ {{ $booking->roomType->price * $booking->total_room *
                            \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                            }}.00</span>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @else

    <section class="p-10 mx-20 my-5">
        <p class="text-red-600 text-[20px] text-center">No results found</p>
    </section>
    @endif


    @endif

@endsection
