@extends('layouts.admin-main')

@section('pages')
<div class="h-auto px-4 pt-6">
    <div class="flex justify-between">
        <div class="">
            <h1 class="text-[20px] font-bold">All Room Types</h1>
        </div>
        <div class="flex">
            <form>
                <div class="flex mr-5">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Name
                    </label>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" name="search"
                            class="block w-[300px] p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Name" required>
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
            </form>

            <a href="/hotel/admin/room-types/create"
                class="btn bg-white normal-case rounded-sm border-[#4634FF] min-h-0 h-[42px] hover:bg-[#4634FF] hover:text-white text-[#4634FF] hover:border-[#4634FF]">+
                Add
                New</a>


        </div>

    </div>
    <div class="mt-5">
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="w-5 px-6 py-3 text-left">S.N.</th>
                    <th class="px-6 py-3 text-center">Name</th>
                    <th class="px-6 py-3 text-center">Fare</th>
                    <th class="px-6 py-3 text-center">Total Rooms</th>
                    <th class="px-6 py-3 text-center">Person</th>
                    <th class="px-6 py-3 w-[190px] text-right">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600 bg-white">
                @foreach ($room_types as $room_type)
                <tr class="border border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 font-medium text-center border ">
                        {{ $loop->iteration }}.
                    </td>
                    <td class="px-6 py-3 font-medium text-center whitespace-normal ">
                        {{ $room_type->name }}
                    </td>
                    <td class="px-6 py-3 font-bold text-center whitespace-normal ">
                        {{ $room_type->price }}.00 USD
                    </td>
                    <td class="px-6 py-3 font-medium text-center whitespace-normal ">
                        {{ count($room_type->rooms) }}
                    </td>
                    <td class="px-6 py-3 font-medium text-center whitespace-normal ">
                        {{ $room_type->person }}
                    </td>
                    <td class="flex justify-around px-6 py-4 text-center whitespace-normal ">

                        <label for="edit-{{ $room_type->id }}"
                            class="btn normal-case bg-white min-h-0 h-[30px] text-[#4634FF] rounded-sm border-[#4634FF] hover:font-medium border px-4 hover:bg-[#4634FF] hover:text-white font-normal">Edit</label>

                        <form method="POST" action="/hotel/admin/room_types/{{ $room_type->id }}/delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit"
                                class="px-4 py-1 font-normal text-red-600 bg-white border border-red-600 rounded-sm hover:font-medium hover:bg-red-600 hover:text-white">
                                <span>Delete</span>
                            </button>
                        </form>

                    </td>
                </tr>
                <input type="checkbox" id="edit-{{ $room_type->id }}" class="modal-toggle" />
                @endforeach
        </table>
    </div>

</div>
@endsection