@extends('layouts.main')

@section('pages')
<section class="z-20 bg-center bg-no-repeat bg-cover bg-room_type">
    <div class="p-16 text-center">
        <h1 class="text-white text-[33px] font-bold">Room Types</h1>
    </div>
</section>

<section class="bg-[#FAFAFA]">
    <div class="container py-20 px-28">
        <div class="grid grid-cols-3 gap-x-4 gap-y-8">
            @foreach ($room_types as $room_type)
            <div class="relative">
                <div class="">
                    <div class="h-[435px]">
                        <div class="absolute">
                            <ul class="ml-7 mt-14">
                                @foreach ($room_type->amenities as $amenity)
                                @if ($amenity->name == "Unlimited WiFi")
                                <li data-tooltip-target="wifi" data-tooltip-placement="right" type="button"
                                    class="bg-[#3C2912] p-3 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#FFFFFF"
                                            d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z" />
                                    </svg>
                                </li>
                                <div id="wifi" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-[118px] px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Unlimited WiFi
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                @endif

                                @if ($amenity->name == "AC")
                                <li data-tooltip-target="ac" data-tooltip-placement="right" type="button"
                                    class="bg-[#3C2912] p-3 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#FFFFFF"
                                            d="M258.6 0c-1.7 0-3.4 .1-5.1 .5C168 17 115.6 102.3 130.5 189.3c2.9 17 8.4 32.9 15.9 47.4L32 224H29.4C13.2 224 0 237.2 0 253.4c0 1.7 .1 3.4 .5 5.1C17 344 102.3 396.4 189.3 381.5c17-2.9 32.9-8.4 47.4-15.9L224 480v2.6c0 16.2 13.2 29.4 29.4 29.4c1.7 0 3.4-.1 5.1-.5C344 495 396.4 409.7 381.5 322.7c-2.9-17-8.4-32.9-15.9-47.4L480 288h2.6c16.2 0 29.4-13.2 29.4-29.4c0-1.7-.1-3.4-.5-5.1C495 168 409.7 115.6 322.7 130.5c-17 2.9-32.9 8.4-47.4 15.9L288 32V29.4C288 13.2 274.8 0 258.6 0zM256 288c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z" />
                                    </svg>
                                </li>
                                <div id="ac" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    AC
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                @endif

                                @if ($amenity->name == "Washing Machine")
                                <li data-tooltip-target="washing_machine" data-tooltip-placement="right" type="button"
                                    class="bg-[#3C2912] p-3 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#FFFFFF"
                                            d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                                    </svg>
                                </li>
                                <div id="washing_machine" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-[136.9px] px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Washing Machine
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                @endif

                                @if ($amenity->name == "Swimming Pool")
                                <li data-tooltip-target="swimming_pool" data-tooltip-placement="right" type="button"
                                    class="bg-[#3C2912] p-3 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 576 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#FFFFFF"
                                            d="M309.5 178.4L447.9 297.1c-1.6 .9-3.2 2-4.8 3c-18 12.4-40.1 20.3-59.2 20.3c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-10.1 0-21.1-2.2-31.9-6.2C163.1 193.2 262.2 96 384 96h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-26.9 0-52.3 6.6-74.5 18.4zM32 160c0-35.3 28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64s-64-28.7-64-64zM306.5 325.9C329 341.4 356.5 352 384 352c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 405.7 417 416 384 416c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 341.2 165.1 352 192 352c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z" />
                                    </svg>
                                </li>
                                <div id="swimming_pool" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-[123px] px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Swimming Pool
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                @endif

                                @if ($amenity->name == "TV")
                                <li data-tooltip-target="tv" data-tooltip-placement="right" type="button"
                                    class="bg-[#3C2912] p-3 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 640 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path fill="#FFFFFF"
                                            d="M64 64V352H576V64H64zM0 64C0 28.7 28.7 0 64 0H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM128 448H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                    </svg>
                                </li>
                                <div id="tv" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    TV
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <img src="/assets/image/{{ $room_type->photo }}" class="min-h-[350px] rounded" alt="">
                    </div>
                    <div
                        class="absolute bottom-0 mx-7 left-0 right-0 p-[1.25rem] rounded-md border-[#ab8a625d] border-2 bg-[#F4F2F0] hover:-translate-y-2 duration-500">
                        <h3 class="text-[25px] font-bold">{{ $room_type->name }}</h3>
                        <div class="mt-2">
                            <h6 class="text-[#AB8A62] text-[18px] font-semibold">{{ $room_type->price }}.00 USD / Night
                            </h6>
                            <div class="flex mt-4 justify-evenly">
                                <div class="bg-[#E5E5E5] py-2 px-5 rounded border-[#d7d7d7]">
                                    <h4 class="text-[15px] text-[#787878] font-medium">People &nbsp {{
                                        $room_type->person }}</h4>
                                </div>
                                <a href="/hotel/type-room/detail/{{ $room_type->id }}"
                                    class="bg-[#AB8A62] text-white py-2 px-3 rounded">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mr-2" viewBox="0 0 576 512">
                                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path fill="#ffffff"
                                                d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z" />
                                        </svg>
                                        <h4 class="text-[15px]">Details</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection