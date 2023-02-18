@extends('layouts.receptionist-main')

@section('pages')
<div class="px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Todays Booked Rooms</h1>
    <div class="grid w-full grid-cols-2 gap-4 xl:grid-cols-3 2xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-lg shadow">
            <h1 class="text-white bg-[#071251] p-5 rounded-md">102</h1>
            <div class="ml-4">
                <h2 class="text-[13px] text-[#5b6e88]">Booking No. :</h2>
                <span class="text-[14px] font-bold text-[#5b6e88]">AJNLDKAJSHDA</span>
                <h2 class="text-[13px] mb-2 text-[#5b6e88]">Room Type : Executive Suite</h2>
                <button class="flex items-center px-3 py-[2px] border-[1px] border-black rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M240 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H176V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H240V80z" />
                    </svg>
                    <p class="text-[13px] ml-2">Add Service</p>
                </button>
                <button class="flex items-center px-3 py-[2px] mt-2 border-[1px] rounded-lg border-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 576 512">
                        <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path fill="#0EA5E8"
                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                    </svg>
                    <p class="text-[13px] ml-2 text-sky-500">View Services</p>
                </button>
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