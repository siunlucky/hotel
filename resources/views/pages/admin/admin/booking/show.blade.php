@extends('layouts.receptionist-main')

@section('pages')
<div class="px-4 pt-6">
    <div class="">
        <h1 class="text-[20px] font-bold">Booking Details of {{ $booking->booking_number }}</h1>
        <div class="my-6 bg-white rounded shadow-md">
            <table class="w-full table-auto min-w-max">
                <h1 class="p-1 ml-2 font-bold text-[#5B6E88]">Booked By:
                    <span class="font-normal text-[#3BA4F3]">
                        {{ $booking->user->name }}
                    </span>
                </h1>
                <thead>
                    <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                        <th class="px-6 py-3 text-left w-52">Date</th>
                        <th class="px-6 py-3 text-right">Room</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-light text-gray-600">
                    @foreach ($dates as $date)
                    <tr class="border border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-3 text-center border">
                            <span class="font-semibold">
                                {{ $date }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-right whitespace-normal border">
                            <div class="grid grid-cols-8 gap-2">
                                @foreach ($booking_details as $booking_detail)
                                <div class="p-2 bg-[#0779E4] rounded-md items-center flex-col flex">
                                    <h1 class="text-2xl font-medium text-white">
                                        {{ $booking_detail->room->room_number }}
                                    </h1>
                                    <span class="text-base font-medium text-white">
                                        {{ $booking_detail->booking->roomType->name }}
                                    </span>
                                </div>

                                @endforeach

                            </div>
                        </td>
                    </tr>
                    @endforeach


            </table>
        </div>
    </div>
</div>

@endsection