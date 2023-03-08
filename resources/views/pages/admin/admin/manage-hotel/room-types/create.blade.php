@extends('layouts.admin-main')

@section('styles')
<style>
    .select2-selection__rendered {
        line-height: 31px !important;

    }

    .select2-container .select2-selection--single {
        height: 35px !important;

    }

    .select2-selection__arrow {
        height: 34px !important;

    }
</style>

@endsection

@section('pages')
<div class="h-auto px-4 pt-6">
    <h1 class="text-[20px] font-bold">Add Room Type</h1>
    <div class="mt-10 bg-white rounded-md">
        <h1 class="px-4 py-2 border-b text-[18px] font-medium">General Information</h1>
        <div class="grid grid-cols-6 gap-4 px-4 py-2 mt-5">
            <div class="flex flex-col col-span-2 mb-5">
                <label for="name"
                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Name</label>
                <input type="text" id="name" name="name" required
                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
            </div>
            @error('username')
            {{ $message }}
            @enderror
            <div class="flex flex-col col-span-2 mb-5">
                <label for="username"
                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Total Person</label>
                <input type="text" id="username" name="username" required
                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
            </div>
            @error('email')
            {{ $message }}
            @enderror
            <div class="flex flex-col col-span-2 mb-5">
                <label for="email"
                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Fare</label>
                <input type="email" id="email" name="email" required
                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
            </div>
            @error('password')
            {{ $message }}
            @enderror
            <div class="flex flex-col col-span-2 mb-5">
                <label for="amenities"
                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Amenities</label>
                <select class="amenities js-states form-control" style="width: 100%" name="amenities[]"
                    data-allow-clear="false" multiple="multiple">
                    @foreach ($amenities as $amenity)
                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                    @endforeach
                </select>

            </div>
            @error('password')
            {{ $message }}
            @enderror
            <div class="flex flex-col col-span-2 mb-5">
                <label for="complements"
                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Complements</label>
                <select
                    class="complements js-states form-control block placeholder:text-[16px] h-10 text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1"
                    name="complements[]" data-allow-clear="false" style="width:100%" id='complements'
                    multiple="multiple">
                    @foreach ($complements as $complement)
                    <option value="{{ $complement->id }}">{{ $complement->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="pb-5 mt-5 bg-white rounded-md">
        <h1 class="px-4 py-2 border-b text-[18px] font-medium">Room Information</h1>
        <div class="flex justify-center py-2 mt-5">
            <div class="flex flex-col col-span-2 mb-5">
                <label for="total-room"
                    class="text-[20px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Total Room</label>
                <input type="number" name="total-room" id="total-room" min="1" max="15" required
                    class="block placeholder:text-[16px] w-[300px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
            </div>
        </div>
        <div id="room-forms" class="grid grid-cols-4 gap-4 px-4 py-2"></div>
    </div>
    <div class="pb-5 mt-5 bg-white rounded-md">
        <h1 class="px-4 py-2 border-b text-[18px] font-medium">Bed Per Room</h1>
        <div class="flex justify-center py-2 mt-5">
            <div class="flex flex-col col-span-2 mb-5">
                <label for="total-bed"
                    class="text-[20px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                    Total Bed</label>
                <input type="number" name="total-bed" id="total-bed" min="1" max="15" required
                    class="block placeholder:text-[16px] w-[300px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
            </div>
        </div>
        <div id="bed-forms" class="grid grid-cols-4 gap-4 px-4 py-2"></div>
    </div>
    <div class="pb-5 mt-5 bg-white rounded-md">
        <h1 class="px-4 py-2 border-b text-[18px] font-medium after:content-['*'] after:ml-0.5 after:text-red-500">
            Description</h1>
        <div class="px-4 mt-5">
            <textarea name="description" id="description" required
                class="block w-full h-[150px] placeholder:text-[16px] text-[16px] bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"></textarea>
        </div>
        <div id="room-forms" class="grid grid-cols-4 gap-4 px-4 py-2"></div>
    </div>
    <div class="px-4 py-5 mt-5 bg-white rounded-md">
        <button class="bg-[#4634FF] text-white w-full h-[50px] rounded-md">Submit</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.complements').select2();
        $('.amenities').select2();
    });

    $(document).ready(function() {
        // Listen for changes to the total room input field
        $('#total-room').on('input', function() {
            
            // Clear any existing forms
            $('#room-forms').empty();

            // Get the new total number of rooms
            var totalRooms = parseInt($(this).val());

            // Generate the forms
            for (var i = 1; i <= totalRooms; i++) {
                var formHtml = '<div class="flex flex-col"> \
                                    <label for="room-' + i + '" class="font-medium">Room - ' + i + ' <span class="text-red-500">*<span></label> \
                                    <div class="relative"> \
                                        <input type="text" class="w-full rounded-md" name="rooms[]" id="room-' + i + '"> \
                                        <button class="room-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500"> \
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg> \
                                        </button> \
                                    </div> \
                                </div>';
                $('#room-forms').append(formHtml);
            }
        });
    });

    $(document).on('click', '.room-remove', function() {
        // Get the current total number of rooms
        var totalRooms = parseInt($('#total-room').val());

        // Remove the last form
        $('#room-forms').children().last().remove();

        // Decrease the total number of rooms by 1
        totalRooms--;

        // Update the total room input field
        $('#total-room').val(totalRooms);
    });

    $(document).ready(function() {
        // Listen for changes to the total room input field
        $('#total-bed').on('input', function() {
            // Clear any existing forms
            $('#bed-forms').empty();

            // Get the new total number of rooms
            var totalBeds = parseInt($(this).val());

            // Generate the forms
            for (var i = 1; i <= totalBeds; i++) {
                var formHtml = '<div class="flex flex-col"> \
                                    <label for="bed-' + i + '" class="font-medium">Bed - ' + i + ' <span class="text-red-500">*<span></label> \
                                    <div class="relative"> \
                                        <select type="text" name="beds[]" required class="w-full rounded-md"> \
                                            <option class="hidden"></option> \
                                            @foreach ($beds as $bed) \
                                                <option class="text-[16px] py-2" id="bed-' + i + '" value="{{ $bed->id }}">{{ $bed->name }}</option> \
                                            @endforeach \
                                        </select>\
                                        <button class="bed-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500"> \
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg> \
                                        </button> \
                                    </div> \
                                </div>';
                $('#bed-forms').append(formHtml);
            }
        });
    });

    $(document).on('click', '.bed-remove', function() {
        // Get the current total number of rooms
        var totalBeds = parseInt($('#total-bed').val());

        // Remove the last form
        $('#bed-forms').children().last().remove();

        // Decrease the total number of rooms by 1
        totalBeds--;

        // Update the total room input field
        $('#total-bed').val(totalBeds);
    });

</script>
@endsection