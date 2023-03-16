@extends('layouts.receptionist-main')

@section('pages')
<div class="px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Todays Booked Rooms</h1>
    <div class="grid w-full grid-cols-2 gap-4 xl:grid-cols-3 2xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-lg shadow">
            <h1 class="text-white bg-[#071251] p-5 rounded-md">102</h1>
            <div class="flex flex-col ml-4">
                <h2 class="text-[13px] text-[#5b6e88]">Booking No. :</h2>
                <span class="text-[14px] font-bold text-[#5b6e88]">AJNLDKAJSHDA</span>
                <h2 class="text-[13px] mb-2 text-[#5b6e88]">Room Type : Executive Suite</h2>
            </div>
        </div>
    </div>

    <h1 class="text-[24px] text-[#34495e] font-semibold py-5">Available for Booking</h1>
    <div class="grid w-full grid-cols-2 gap-4 xl:grid-cols-3 2xl:grid-cols-6">
        @foreach ($rooms as $room)
        <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow">
            <div class="text-center text-[#5b6e88]">
                <h1 class="mb-1 font-bold">{{ $room->room_number }}</h1>
                <h2 class="text-[14px]">{{ $room->roomType->name }}</h2>
            </div>
        </div>
        @endforeach


    </div>

</div>
@endsection
