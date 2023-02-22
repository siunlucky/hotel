@extends('layouts.receptionist-main')

@section('pages')
<div class="h-auto px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Book Room</h1>
    <div class="p-4 bg-white ">
        <form action="">
            @csrf
            <div class="grid grid-cols-11 gap-4">
                <div class="flex flex-col col-span-3">
                    <label for="room_type"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Room
                        Type</label>
                    <select type="text"
                        class="block w-full px-5 placeholder:text-[16px] text-[16px] py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                        <option class="hidden">Select One</option>
                        @foreach ($room_types as $room_type)
                        <option class="text-[16px] py-2" value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex flex-col col-span-3">
                    <label for="date_range"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Check
                        In - Check Out Data</label>
                    <input type="text" placeholder="Select Date" id="date_range" name="date_range"
                        class="block w-full placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                </div>
                <div class="flex flex-col col-span-3">
                    <label for="room"
                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Room</label>
                    <input type="number" min="1" placeholder="How many room?"
                        class="block placeholder:text-[16px] text-[16px] w-full px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                </div>
                <div class="flex flex-col col-span-2 ">
                    <label for=""
                        class="text-[14px] opacity-0 after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">Submit</label>
                    <button
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
@endsection