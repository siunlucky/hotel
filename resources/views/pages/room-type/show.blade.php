@extends('layouts.main')

@section('pages')
    <section class="z-20 bg-center bg-no-repeat bg-cover bg-room_type">
        <div class="p-16 text-center">
            <h1 class="text-white text-[33px] font-bold">{{ $room_type->name }}</h1>
        </div>
    </section>

    <section class="bg-[#FAFAFA]">
        <div class="container py-20 px-28">
            <div class="grid justify-between grid-cols-3 gap-7">
                <div class="col-span-2">
                    <div class="relative">
                        <div class="h-[70px]">
                            <div class="absolute top-0 left-0 right-0 flex justify-around py-6 mx-20 bg-white rounded-md ">
                                <div class="text-center text-[#66625D]">
                                    <h1 class="text-[43px]">{{ $room_type->name }}</h1>
                                    <span class="text-[16px]">Person {{ $room_type->person }}</span>
                                </div>
                                <div class="text-left text-[#AB8A62]">
                                    <h1 class="text-[37px] font-bold">${{ $room_type->price }}.00</h1>
                                    <span class="text-[15px]">/night</span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <img src="/storage/typeRoomPhoto/{{ $photos[0]->photo }}" class="object-cover object-center w-full h-[400px] rounded-md" alt="">
                        </div>
                    </div>
                    <div class="px-24 mt-5">
                        <div class="grid justify-between grid-cols-3 gap-5">
                            @foreach ($photos as $photo)
                                <img class="h-[125px] w-full rounded-md object-cover object-center" src="/storage/typeRoomPhoto/{{ $photo->photo }}"
                                    alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-2 px-5 py-2 pt-5 mt-5 bg-white">
                        <div class="border-[#efefef] border-b pb-3">
                            <h1 class="text-[23px] font-bold text-[#66625d]">Description</h1>
                        </div>
                        <p class="text-[#66625d] py-3 leading-7">
                            {{ $room_type->description }}
                        </p>
                    </div>
                    <div class="col-span-2 px-5 py-1 pt-5 mt-5 bg-white">
                        <div class="border-[#efefef] border-b pb-3">
                            <h1 class="text-[23px] font-bold text-[#66625d]">Amenities</h1>
                        </div>
                        <div class="flex amenities">
                            @if (!empty($amenities))
                                @foreach ($amenities as $amenity)
                                    <div class="flex mr-10">
                                        @if ($amenity->id_amenities === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z" />
                                            </svg>
                                        @elseif($amenity->id_amenities === 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M258.6 0c-1.7 0-3.4 .1-5.1 .5C168 17 115.6 102.3 130.5 189.3c2.9 17 8.4 32.9 15.9 47.4L32 224H29.4C13.2 224 0 237.2 0 253.4c0 1.7 .1 3.4 .5 5.1C17 344 102.3 396.4 189.3 381.5c17-2.9 32.9-8.4 47.4-15.9L224 480v2.6c0 16.2 13.2 29.4 29.4 29.4c1.7 0 3.4-.1 5.1-.5C344 495 396.4 409.7 381.5 322.7c-2.9-17-8.4-32.9-15.9-47.4L480 288h2.6c16.2 0 29.4-13.2 29.4-29.4c0-1.7-.1-3.4-.5-5.1C495 168 409.7 115.6 322.7 130.5c-17 2.9-32.9 8.4-47.4 15.9L288 32V29.4C288 13.2 274.8 0 258.6 0zM256 288c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z" />
                                            </svg>
                                        @elseif($amenity->id_amenities === 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                                            </svg>
                                        @elseif($amenity->id_amenities === 4)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 576 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M309.5 178.4L447.9 297.1c-1.6 .9-3.2 2-4.8 3c-18 12.4-40.1 20.3-59.2 20.3c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-10.1 0-21.1-2.2-31.9-6.2C163.1 193.2 262.2 96 384 96h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-26.9 0-52.3 6.6-74.5 18.4zM32 160c0-35.3 28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64s-64-28.7-64-64zM306.5 325.9C329 341.4 356.5 352 384 352c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 405.7 417 416 384 416c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 341.2 165.1 352 192 352c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z" />
                                            </svg>
                                        @elseif($amenity->id_amenities === 5)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M64 64V352H576V64H64zM0 64C0 28.7 28.7 0 64 0H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM128 448H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="#66625d"
                                                    d="M374.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7 86.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                            </svg>
                                        @endif
                                        <p class="text-[#66625d] py-3 px-2 leading-7">
                                            {{ $amenity->name }}
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <div class="px-1 py-4">No Amenities</div>
                            @endif

                        </div>
                    </div>
                    <div class="col-span-2 px-5 py-1 pt-5 mt-5 bg-white">
                        <div class="border-[#efefef] border-b pb-3">
                            <h1 class="text-[23px] font-bold text-[#66625d]">Complements</h1>
                        </div>
                        <div class="flex flex-wrap">
                            @foreach ($complements as $complement)
                                <div class="flex mr-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#66625d"
                                            d="M374.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7 86.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                    </svg>
                                    <p class="text-[#66625d] py-3 px-2 leading-7">
                                        {{ $complement->name }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-2 px-5 py-1 pt-5 mt-5 bg-white">
                        <div class="border-[#efefef] border-b pb-3">
                            <h1 class="text-[23px] font-bold text-[#66625d]">Beds</h1>
                        </div>
                        <div class="flex beds">
                            @foreach ($beds as $bed)
                                <div class="flex mr-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#66625d"
                                            d="M374.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7 86.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                    </svg>
                                    <p class="text-[#66625d] py-3 px-2 leading-7">{{ $bed->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-white rounded-md p-[2.5rem]">
                        <form>
                            @csrf
                            <div date-rangepicker>
                                <div class="mb-3">
                                    @error('check_in_date')
                                        {{ $message }}
                                    @enderror
                                    <label class="font-semibold" for="check_in_date">Check-In</label>
                                    <div class="relative pt-2">
                                        <div
                                            class="absolute z-10 inset-y-0 pt-2 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 fill-[#c4c4c4] hover:fill-[#AB8A62]"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input name="check_in_date" id="check_in_date" type="text"
                                            value="{{ request('check_in_date') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @error('check_out_date')
                                        {{ $message }}
                                    @enderror
                                    <label class="font-semibold" for="check_out_date">Check-Out</label>
                                    <div class="relative pt-2">
                                        <div
                                            class="absolute z-10 inset-y-0 pt-2 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="#c4c4c4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input name="check_out_date" id="check_out_date" type="text"
                                            value="{{ request('check_out_date') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <input name="room_type" type="hidden" value="{{ $room_type->id }}"
                                        class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Month/Date/Year">
                                </div>
                                <div class="mb-7">
                                    @error('total_room')
                                        {{ $message }}
                                    @enderror
                                    <label class="font-semibold" for="total_room">Rooms</label>
                                    <div class="relative pt-2">
                                        <input name="total_room" id="total_room" min="1" type="number"
                                            value="{{ request('total_room') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-7 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Numbers of Rooms">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" disabled id="myButton"
                                        class="p-3 w-full rounded-md text-white font-semibold bg-[#C9B399]">SELECT
                                        ROOM</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        @if (isset($startDate) && isset($endDate) && isset($totalRoom))
                            <form action="/hotel/booking/store" method="POST">
                                @csrf
                                <div class="bg-white rounded-md mt-5 p-[2.5rem]">
                                    <div class="mb-3">
                                        <input name="room_type_id" type="hidden" value="{{ $room_type->id }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                    <div class="mb-3">
                                        <input name="check_in_date" type="hidden"
                                            value="{{ request('check_in_date') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                    <div class="mb-3">
                                        <input name="check_out_date" type="hidden"
                                            value="{{ request('check_out_date') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                    <div class="mb-3">
                                        <input name="total_room" type="hidden" value="{{ request('total_room') }}"
                                            class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Month/Date/Year">
                                    </div>
                                    <div class="mb-3">
                                        @error('booking_name')
                                            {{ $message }}
                                        @enderror
                                        <label class="font-semibold" for="booking_name">Name</label>
                                        <div class="relative pt-2">
                                            <input name="booking_name" id="booking_name" type="text"
                                                value="{{ request('booking_name') }}"
                                                class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-7 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="John La">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @error('booking_email')
                                            {{ $message }}
                                        @enderror
                                        <label class="font-semibold" for="booking_email">Email</label>
                                        <div class="relative pt-2">
                                            <input name="booking_email" id="booking_email" type="email"
                                                value="{{ request('booking_email') }}"
                                                class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-7 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="johnla@example.com">
                                        </div>
                                    </div>

                                    <div class="mb-7">
                                        @error('booking_phone')
                                            {{ $message }}
                                        @enderror
                                        <label class="font-semibold" for="booking_phone">Phone Number</label>
                                        <div class="relative pt-2">
                                            <input name="booking_phone" id="booking_phone" type="text"
                                                value="{{ request('booking_phone') }}"
                                                class="block z-0 placeholder:text-slate-400 placeholder:text-[16px] text-[16px] w-full p-3 pl-7 text-sm text-gray-900 bg-white border border-[#e5e5e5] rounded-lg focus:ring-[#AB8A62] focus:border-[#AB8A62] focus:drop-shadow-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Numbers of Rooms">
                                        </div>
                                    </div>
                                    <div>
                                        <table class="w-full mb-5 table-auto min-w-max">
                                            <thead>
                                                <tr class="text-xs leading-normal text-white uppercase bg-[#AB8A62]">
                                                    <th class="px-6 py-3 text-left">Date</th>
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
                                                        <td class="px-6 py-3 text-left whitespace-normal border">
                                                            <div class="grid grid-cols-4 gap-1">

                                                                @foreach ($rooms as $room)
                                                                    @php
                                                                        $dateObj = \Carbon\Carbon::createFromFormat('d M, Y', $date);
                                                                    @endphp
                                                                    <div
                                                                        class="p-2  {{ $room->isAvailable($dateObj) ? 'bg-[#4634FF]' : 'bg-[#EA5455]' }} rounded-md text-center">
                                                                        <input type="checkbox" name="rooms[]"
                                                                            id="room{{ $date . $room->id }}"
                                                                            class="sr-only room-checkbox room-{{ $room->id }}"
                                                                            onchange="checkRelatedRooms(this, 'room-{{ $room->id }}')"
                                                                            value="{{ $room->id }}"
                                                                            {{ in_array($room->id, $selectedRooms) ? 'checked' : '' }}
                                                                            {{ $room->isAvailable($dateObj) ? '' : 'disabled' }}>
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
                                        <div>
                                            <button type="submit"
                                                class="p-3 w-full rounded-md text-white font-semibold bg-[#C9B399]">SEND
                                                BOOKING
                                                REQUEST</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
                <div class="col-span-2">

                </div>
            </div>
    </section>

@endsection

@section('scripts')
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

    <script>
        const check_in_date = document.getElementById('check_in_date');
        const check_out_date = document.getElementById('check_out_date');
        const total_room = document.getElementById('total_room');
        const myButton = document.getElementById('myButton');


        // Add event listeners to each input element
        check_in_date.addEventListener('input', checkInputs);
        check_out_date.addEventListener('input', checkInputs);
        total_room.addEventListener('input', checkInputs);

        function checkInputs() {
            // Check if all three input fields have a value
            if (check_in_date.value && check_out_date && total_room.value) {
                // Enable the button and change its color
                myButton.disabled = false;
                myButton.style.backgroundColor = '#AB8A62';
            } else {
                // Disable the button and reset its color
                myButton.disabled = true;
                myButton.style.backgroundColor = '';
            }
        }
    </script>
@endsection
