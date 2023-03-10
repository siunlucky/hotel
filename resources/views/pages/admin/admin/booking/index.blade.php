@extends('layouts.receptionist-main')

@section('pages')
<div class="px-4 pt-6">
    <div class="flex justify-between">
        <h1 class="text-[20px] font-bold">{{ $table }}</h1>
        @if ($table == 'All Booking Request')
        <form>
            @csrf
            <div class="flex mr-5">
                <label for="booking-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                    Name / Booking Number
                </label>
                <div class="relative w-full">
                    <input type="text" id="booking-search" name="booking_search"
                        class="block w-[300px] p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Name / Booking Number" required>
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        @else
        <form>
            <div class="flex">
                <div class="flex mr-5">
                    <label for="booking-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Name / Booking Number
                    </label>
                    <div class="relative w-full">
                        <input type="text" id="booking-search" name="booking_search"
                            class="block w-[300px] p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Name / Booking Number" value="{{ request('booking_search') }}">
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
                <div class="flex">
                    <label for="check-in-date" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Check In Date
                    </label>
                    <div class="relative w-full">
                        <input type="text" id="check-in-date" name="check_in_date"
                            class="block w-[300px] p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Check In Date" value="{{ request('check_in_date') }}">
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>

    <div class="my-6 bg-white rounded shadow-md">
        @if ($table == 'All Booking Request')
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left">Username | Email</th>
                    <th class="px-6 py-3 text-center">Room Qty | Room Type</th>
                    <th class="px-6 py-3 text-center">Check In | Check Out</th>
                    <th class="px-6 py-3 text-center">Fare /Night | Total Fare</th>
                    <th class="px-6 py-3 text-right">Actions</th>

                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                @foreach ($bookings as $booking)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-left whitespace-normal">
                        <div class="flex flex-col items-left">
                            <span class="font-bold text-[15px]">
                                {{ $booking->booking_name }}
                            </span>
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->booking_email }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->total_room }}
                            </span>
                            <span class="mt-1 text-sm font-bold">
                                {{ $booking->roomType->name }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center ">
                        <div class="flex flex-col">
                            <span class="font-normal">
                                {{ date('d M, Y', strtotime($booking->check_in_date)); }}
                            </span>
                            <span class="font-normal">
                                <span class="font-bold text-gray-500">to</span>
                                {{ date('d M, Y', strtotime($booking->check_out_date)); }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center font-medium text-[15px]">
                                ${{ $booking->roomType->price * $booking->total_room }}.00
                            </span>
                            <span class="font-medium text-green-500">
                                ${{ $booking->roomType->price * $booking->total_room *
                                \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                                }}.00
                            </span>
                        </div>
                    </td>

                    <td class="flex items-center justify-end px-6 py-3">
                        <a href="/hotel/{{ auth()->user()->role }}/booking/approving/{{ $booking->id }}}">
                            <button
                                class="flex items-center px-3 py-2 mr-2 font-medium text-green-400 border border-green-400 rounded hover:bg-green-500 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-0.5 mr-[13px]" fill="currentColor"
                                    viewBox="0 0 512 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                                <span class="">
                                    Approve
                                </span>
                            </button>
                        </a>

                        <a href="/hotel/{{ auth()->user()->role }}/booking/canceling/{{ $booking->id }}">
                            <button
                                class="flex items-center px-3 py-2 font-medium text-red-500 border border-red-500 rounded hover:bg-red-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    class="w-3 ml-0.5 mr-[13px]" fill="currentColor">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z" />
                                </svg>
                                <span class="">
                                    Cancel
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @elseif($table == 'Upcoming and Running')
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-center">S.N.</th>
                    <th class="px-6 py-3 text-center">Booking Number</th>
                    <th class="px-6 py-3 text-center">User</th>
                    <th class="px-6 py-3 text-center">Booked For</th>
                    <th class="px-6 py-3 text-center">Total Fare | Extra Service</th>
                    <th class="px-6 py-3 text-center">Total Cost</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                @foreach ($bookings as $booking)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-center">
                        <span class="font-semibold">{{ $loop->iteration }}.</span>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-normal">
                        <div class="flex flex-col items-center">
                            <span class="font-bold">
                                {{ $booking->booking_number }}
                            </span>
                            <span class="flex items-center mt-2 text-sm font-normal">
                                @if ($booking->booking_status == 'check_in')
                                <div class="w-3 h-3 mr-1 bg-green-400 rounded-full"></div>
                                Running
                                @else
                                <div class="w-3 h-3 mr-1 bg-orange-400 rounded-full"></div>
                                Upcoming
                                @endif
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->booking_name }}

                            </span>
                            <span class="mt-1 text-sm font-bold">
                                {{ $booking->booking_email }}

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center ">
                        <div class="flex flex-col">
                            <span class="font-normal">
                                {{ date('d M, Y', strtotime($booking->check_in_date)); }}
                            </span>
                            <span class="font-normal">
                                <span class="font-bold text-gray-500">to</span>
                                {{ date('d M, Y', strtotime($booking->check_out_date)); }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center font-medium text-[15px]">
                                ${{ $booking->roomType->price * $booking->total_room *
                                \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                                }}.00
                            </span>
                            <span class="font-medium text-green-500">
                                $0.00
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 font-semibold text-center">
                        ${{ $booking->roomType->price * $booking->total_room *
                        \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                        }}.00
                    </td>
                    <td class="flex flex-col float-right px-6 py-3">
                        <a href="/hotel/{{ auth()->user()->role }}/booking/booking-detail/{{ $booking->id }}">
                            <button
                                class="flex items-center px-2 py-1 font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[5px] ml-0.5 mr-[13px]"
                                    fill="currentColor" viewBox="0 0 192 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z" />
                                </svg>
                                <span class="">
                                    Details
                                </span>
                            </button>
                        </a>
                        <div class="flex justify-end mt-1">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $booking->id }}"
                                class="flex items-center px-2 py-1 font-medium text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[4px] ml-0.5 mr-[13px]"
                                    viewBox="0 0 128 512" fill="currentColor">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z" />
                                </svg>
                                <span>More</span>
                            </button>
                        </div>
                        <div class="">
                            <!-- Dropdown menu -->
                            <div id="dropdown{{ $booking->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    @if ($booking->booking_status == 'check_in')
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-3"
                                                viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Extra Services
                                            </span>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-3"
                                                viewBox="0 0 576 512">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Receive Payment
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/hotel/{{ auth()->user()->role }}/booking/check-out/{{ $booking->id }}"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-3"
                                                viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Check Out
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-3"
                                                viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Print Invoice
                                            </span>

                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="/hotel/{{ auth()->user()->role }}/booking/check-in/{{ $booking->id }}"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-3"
                                                viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Check In
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/hotel/{{ auth()->user()->role }}/booking/canceling/{{ $booking->id }}"
                                            class="flex items-center px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="w-3 mr-3">
                                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                                            </svg>
                                            <span class="font-semibold">
                                                Cancel
                                            </span>
                                        </a>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        @elseif($table == 'Cancelled Bookings')
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-center">S.N.</th>
                    <th class="px-6 py-3 text-center">Booking Number</th>
                    <th class="px-6 py-3 text-center">User</th>
                    <th class="px-6 py-3 text-center">Booked For</th>
                    <th class="px-6 py-3 text-center">Total Fare | Extra Service</th>
                    <th class="px-6 py-3 text-center">Total Cost</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                @foreach ($bookings as $booking)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-center">
                        <span class="font-semibold">{{ $loop->iteration }}.</span>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-normal">
                        <div class="flex flex-col items-center">
                            <span class="font-bold">
                                {{ $booking->booking_number }}

                            </span>
                            <span class="flex items-center mt-2 text-sm font-normal">
                                <div class="w-3 h-3 mr-1 bg-red-500 rounded-full"></div>
                                Cancelled

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->booking_name }}

                            </span>
                            <span class="mt-1 text-sm font-bold">
                                {{ $booking->booking_email }}

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center ">
                        <div class="flex flex-col">
                            <span class="font-normal">
                                {{ date('d M, Y', strtotime($booking->check_in_date)); }}
                            </span>
                            <span class="font-normal">
                                <span class="font-bold text-gray-500">to</span>
                                {{ date('d M, Y', strtotime($booking->check_out_date)); }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center font-medium text-[15px]">
                                ${{ $booking->roomType->price * $booking->total_room *
                                \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                                }}.00
                            </span>
                            <span class="font-medium text-green-500">
                                $0.00
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 font-semibold text-center">
                        ${{ $booking->roomType->price * $booking->total_room *
                        \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                        }}.00
                    </td>
                    <td class="flex flex-col float-right px-6 py-3">
                        <a href="/hotel/{{ auth()->user()->role }}/booking/booking-detail/{{ $booking->id }}">
                            <button
                                class="flex items-center px-2 py-1 font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[5px] ml-0.5 mr-[13px]"
                                    fill="currentColor" viewBox="0 0 192 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z" />
                                </svg>
                                <span class="">
                                    Details
                                </span>
                            </button>
                        </a>
                        <div class="flex justify-end mt-1">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="flex items-center px-2 py-1 font-medium text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[4px] ml-0.5 mr-[13px]"
                                    viewBox="0 0 128 512" fill="currentColor">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z" />
                                </svg>
                                <span>More</span>

                            </button>
                        </div>
                        <div class="">
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @elseif($table == 'Checked Out')
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-center">S.N.</th>
                    <th class="px-6 py-3 text-center">Booking Number</th>
                    <th class="px-6 py-3 text-center">User</th>
                    <th class="px-6 py-3 text-center">Booked For</th>
                    <th class="px-6 py-3 text-center">Total Fare | Extra Service</th>
                    <th class="px-6 py-3 text-center">Total Cost</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                @foreach ($bookings as $booking)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-center">
                        <span class="font-semibold">{{ $loop->iteration }}.</span>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-normal">
                        <div class="flex flex-col items-center">
                            <span class="font-bold">
                                {{ $booking->booking_number }}

                            </span>
                            <span class="flex items-center mt-2 text-sm font-normal">
                                <div class="w-3 h-3 mr-1 bg-black rounded-full"></div>
                                Checked Out

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->booking_name }}

                            </span>
                            <span class="mt-1 text-sm font-bold">
                                {{ $booking->booking_email }}

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center ">
                        <div class="flex flex-col">
                            <span class="font-normal">
                                {{ date('d M, Y', strtotime($booking->check_in_date)); }}
                            </span>
                            <span class="font-normal">
                                <span class="font-bold text-gray-500">to</span>
                                {{ date('d M, Y', strtotime($booking->check_out_date)); }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center font-medium text-[15px]">
                                ${{ $booking->roomType->price * $booking->total_room *
                                \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                                }}.00
                            </span>
                            <span class="font-medium text-green-500">
                                $0.00
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 font-semibold text-center">
                        ${{ $booking->roomType->price * $booking->total_room *
                        \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                        }}.00
                    </td>
                    <td class="flex flex-col float-right px-6 py-3">
                        <a href="/hotel/{{ auth()->user()->role }}/booking/booking-detail/{{ $booking->id }}">
                            <button
                                class="flex items-center px-2 py-1 font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[5px] ml-0.5 mr-[13px]"
                                    fill="currentColor" viewBox="0 0 192 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z" />
                                </svg>
                                <span class="">
                                    Details
                                </span>
                            </button>
                        </a>
                        <div class="flex justify-end mt-1">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="flex items-center px-2 py-1 font-medium text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[4px] ml-0.5 mr-[13px]"
                                    viewBox="0 0 128 512" fill="currentColor">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z" />
                                </svg>
                                <span>More</span>

                            </button>
                        </div>
                        <div class="">
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @elseif($table == 'All Bookings')
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-center">S.N.</th>
                    <th class="px-6 py-3 text-center">Booking Number</th>
                    <th class="px-6 py-3 text-center">User</th>
                    <th class="px-6 py-3 text-center">Booked For</th>
                    <th class="px-6 py-3 text-center">Total Fare | Extra Service</th>
                    <th class="px-6 py-3 text-center">Total Cost</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                @foreach ($bookings as $booking)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-center">
                        <span class="font-semibold">{{ $loop->iteration }}.</span>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-normal">
                        <div class="flex flex-col items-center">
                            <span class="font-bold">
                                {{ $booking->booking_number }}

                            </span>
                            <span class="flex items-center mt-2 text-sm font-normal">
                                @if ($booking->booking_status == 'check_out')
                                <div class="w-3 h-3 mr-1 bg-black rounded-full"></div>
                                Checked Out
                                @elseif($booking->booking_status == 'cancelled')
                                <div class="w-3 h-3 mr-1 bg-red-500 rounded-full"></div>
                                Cancelled
                                @elseif($booking->booking_status == 'check_in')
                                <div class="w-3 h-3 mr-1 bg-green-400 rounded-full"></div>
                                Running
                                @elseif($booking->booking_status == 'approved')
                                <div class="w-3 h-3 mr-1 bg-orange-400 rounded-full"></div>
                                Upcoming
                                @endif


                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center text-sm font-normal">
                                {{ $booking->booking_name }}

                            </span>
                            <span class="mt-1 text-sm font-bold">
                                {{ $booking->booking_email }}

                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center ">
                        <div class="flex flex-col">
                            <span class="font-normal">
                                {{ date('d M, Y', strtotime($booking->check_in_date)); }}
                            </span>
                            <span class="font-normal">
                                <span class="font-bold text-gray-500">to</span>
                                {{ date('d M, Y', strtotime($booking->check_out_date)); }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="flex items-center font-medium text-[15px]">
                                ${{ $booking->roomType->price * $booking->total_room *
                                \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                                }}.00
                            </span>
                            <span class="font-medium text-green-500">
                                $0.00
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-3 font-semibold text-center">
                        ${{ $booking->roomType->price * $booking->total_room *
                        \Carbon\Carbon::parse($booking->check_in_date)->diffInDays($booking->check_out_date);
                        }}.00
                    </td>
                    <td class="flex flex-col float-right px-6 py-3">
                        <a href="/hotel/{{ auth()->user()->role }}/booking/booking-detail/{{ $booking->id }}">
                            <button
                                class="flex items-center px-2 py-1 font-medium text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[5px] ml-0.5 mr-[13px]"
                                    fill="currentColor" viewBox="0 0 192 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z" />
                                </svg>
                                <span class="">
                                    Details
                                </span>
                            </button>
                        </a>
                        <div class="flex justify-end mt-1">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="flex items-center px-2 py-1 font-medium text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[4px] ml-0.5 mr-[13px]"
                                    viewBox="0 0 128 512" fill="currentColor">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z" />
                                </svg>
                                <span>More</span>

                            </button>
                        </div>
                        <div class="">
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
        @endif

    </div>
</div>
@endsection
