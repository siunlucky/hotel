@extends('layouts.receptionist-main')

@section('pages')
<div class="h-auto px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Book Room</h1>
    <div class="p-4 bg-white rounded-md">
        <form action="">
            @csrf
            <div class="grid grid-cols-11 gap-4">
                <div class="flex flex-col col-span-3">
                    <label for="room_type"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Room
                        Type</label>
                    <select type="text" name="room_type" required
                        class="block w-full px-5 placeholder:text-[16px] text-[16px] py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                        <option class="hidden">Select One</option>
                        @foreach ($room_types as $room_type)
                        <option class="text-[16px] py-2" id="room_type" {{ $roomType==$room_type->id ? "selected"
                            : "" }} value="{{ $room_type->id }}">{{
                            $room_type->name
                            }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex flex-col col-span-3">
                    <label for="date_range"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Check
                        In - Check Out Data</label>
                    <input type="text" placeholder="Select Date" id="date_range" name="date_range" required
                        value="{{ $dateRange }}"
                        class="block w-full placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                </div>
                <div class="flex flex-col col-span-3">
                    <label for="room"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Room</label>
                    <input type="number" min="1" placeholder="How many room?" id="many_rooms" name="many_rooms"
                        value="{{ $manyRooms }}" required
                        class="block placeholder:text-[16px] text-[16px] w-full px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                </div>
                <div class="flex flex-col col-span-2 ">
                    <label for=""
                        class="text-[14px] opacity-0 after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Submit</label>
                    <button type="submit"
                        class="w-full flex justify-center px-3 text-white py-3 mt-1 bg-[#4634FF] border rounded-md shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path fill="#FFFFFF"
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                            <span class="ml-1 font-semibold">Search</span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (isset($dateRange))
    <form action="/hotel/{{ auth()->user()->role }}/book-room/store">
        @csrf
        <input type="hidden" name="date_range" value="{{ $dateRange }}">
        <input type="hidden" name="total_room" value="{{ $manyRooms }}">
        <input type="hidden" name="room_type" value="{{ $roomType }}">
        <div class="grid grid-cols-3 pt-5 gap-7">
            <div class="col-span-2 bg-white rounded-md">
                <h1 class="py-3 px-4 text-[19px] border-b font-semibold">Booking Information</h1>
                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div class="w-4 h-4 mr-1 bg-[#EA5455] rounded-full"></div>
                        <span class="mr-3">Booked</span>
                        <div class="w-4 h-4 mr-1 bg-[#28C76F] rounded-full"></div>
                        <span class="mr-3">Selected</span>
                        <div class="w-4 h-4 mr-1 bg-[#4634FF] rounded-full"></div>
                        <span class="mr-3">Available</span>
                    </div>
                    <table class="w-full table-auto min-w-max">
                        <thead>
                            <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                                <th class="px-6 py-3 text-left w-52">Date</th>
                                <th class="px-6 py-3 text-right">Room</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-light text-gray-600">
                            @foreach($dates as $date)
                            <tr class="border border-gray-200 hover:bg-gray-100">
                                <td class="px-6 py-3 text-center border">
                                    <span class="font-semibold">
                                        {{ $date }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-normal border">
                                    <div class="grid grid-cols-11 gap-1">

                                        @foreach ($rooms as $room)
                                        @php
                                        $dateObj = \Carbon\Carbon::createFromFormat('d M, Y', $date);
                                        @endphp
                                        <div
                                            class="p-2  {{ ($room->isAvailable($dateObj) ? 'bg-[#4634FF]' : 'bg-[#EA5455]') }} rounded-md text-center">
                                            <input type="checkbox" name="rooms[]" id="room{{ $date . $room->id }}"
                                                class="sr-only room-checkbox room-{{ $room->id }}"
                                                onchange="checkRelatedRooms(this, 'room-{{ $room->id }}')"
                                                value="{{ $room->id }}" {{ in_array($room->id, $selectedRooms) ?
                                            'checked' : '' }} {{ ($room->isAvailable($dateObj)) ? '' : 'disabled' }}>
                                            <label for="room{{ $date . $room->id }}"
                                                class="text-[15px] font-semibold cursor-pointer text-white ">
                                                {{ $room->room_number }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
            <div class="col-span-1 bg-white rounded-md">
                <h1 class="py-3 px-4 text-[19px] border-b font-semibold">Book Room</h1>
                <div class="p-5 ">
                    <div class="flex flex-col col-span-3 mb-5">
                        <label for="booking_name"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Name</label>
                        <input type="text" id="booking_name" name="booking_name" required
                            class="block w-full placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    <div class="flex flex-col col-span-3 mb-5">
                        <label for="booking_email"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Email</label>
                        <input type="email" id="booking_email" name="booking_email" required
                            class="block w-full placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    <div class="flex flex-col col-span-3 mb-5">
                        <label for="booking_phone"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Phone Number</label>
                        <input type="text" id="booking_phone" name="booking_phone" required
                            class="block w-full placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    <button type="submit"
                        class="bg-[#4634FF] text-white w-full h-11 text-center align-center rounded-md">Book
                        Now</button>
                </div>

            </div>
        </div>
    </form>
    @endif

</div>
@endsection

@section('scripts')
<script>
    flatpickr("#date_range", {
        mode: "range",
        // Disable all dates before today
        minDate: "today",
        // Disable the end date if it is the same as the start date
        disable: [
            function(date) {
                return (date <= this.selectedDates);
            }
        ],
        dateFormat: "d/m/Y",
        // Restrict the end date to be at least one day after the start date
        onChange: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 1) {
                var diff = Math.floor((selectedDates[1] - selectedDates[0]) / (1000 * 60 * 60 * 24));
                if (diff < 1) {
                    instance.setDate(selectedDates[0].fp_incr(1), false);
                }
            }
        }
    });
    
</script>
<script>
    function checkRelatedRooms(checkbox, className) {
        // Get all checkboxes with the same class name as the clicked checkbox
        var relatedCheckboxes = document.getElementsByClassName(className);
    
        // Check or uncheck all related checkboxes based on the clicked checkbox state
        for (var i = 0; i < relatedCheckboxes.length; i++) {
            if (checkbox.checked) {
                relatedCheckboxes[i].checked = true;
                relatedCheckboxes[i].parentNode.classList.add('bg-[#28C76F]');
            } else {
                relatedCheckboxes[i].checked = false;
                relatedCheckboxes[i].parentNode.classList.remove('bg-[#28C76F]');
            }
        }
    }
</script>

@endsection