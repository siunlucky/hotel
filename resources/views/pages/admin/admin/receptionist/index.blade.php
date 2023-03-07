@extends('layouts.receptionist-main')

@section('pages')
<div class="px-4 pt-6">
    <div class="flex justify-between">
        <div class="">
            <h1 class="text-[20px] font-bold">All Receptionist</h1>
        </div>
        <div class="flex">
            <form>
                <div class="flex mr-5">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Username / Name
                    </label>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" name="search"
                            class="block w-[300px] p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Username / Name" required>
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

            <label for="create"
                class="btn bg-white normal-case rounded-sm border-[#4634FF] min-h-0 h-[42px] hover:bg-[#4634FF] hover:text-white text-[#4634FF] hover:border-[#4634FF]">+
                Add
                New</label>

            <!-- Put this part before </body> tag -->
            <input type="checkbox" id="create" class="modal-toggle" />
            <label for="create" class="cursor-pointer modal">
                <label class="relative modal-box" for="">
                    <label for="create" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
                    <h3 class="text-[20px] font-bold border-b-2 pb-2 mb-5">Add New Receptionist</h3>

                    <form action="/hotel/admin/receptionist/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            @error('name')
                            {{ $message }}
                            @enderror
                            <div class="flex flex-col col-span-3 mb-5">
                                <label for="name"
                                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                    Name</label>
                                <input type="text" id="name" name="name" required
                                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                            </div>
                            @error('username')
                            {{ $message }}
                            @enderror
                            <div class="flex flex-col col-span-3 mb-5">
                                <label for="username"
                                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                    Username</label>
                                <input type="text" id="username" name="username" required
                                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                            </div>
                            @error('email')
                            {{ $message }}
                            @enderror
                            <div class="flex flex-col col-span-3 mb-5">
                                <label for="email"
                                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                    Email</label>
                                <input type="email" id="email" name="email" required
                                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                            </div>
                            @error('password')
                            {{ $message }}
                            @enderror
                            <div class="flex flex-col col-span-3 mb-5">
                                <label for="password"
                                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                    Password</label>
                                <input type="text" id="password" name="password" required
                                    class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                            </div>
                            @error('photo')
                            {{ $message }}
                            @enderror
                            <div class="flex flex-col col-span-3 mb-5">
                                <label for="photo"
                                    class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                    Image</label>
                                <input type="file" name="photo" id="photo"
                                    class="w-full mt-1 file-input file-input-bordered" />
                            </div>
                            <button type="submit"
                                class="bg-[#4634FF] text-white w-full h-11 text-center align-center rounded-md">Book
                                Now</button>
                        </div>
                    </form>
                </label>
            </label>
        </div>

    </div>
    <div class="mt-5">
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="w-5 px-6 py-3 text-left">S.N.</th>
                    <th class="px-6 py-3 text-center">Username</th>
                    <th class="px-6 py-3 text-center">Name</th>
                    <th class="px-6 py-3 text-center ">Email</th>
                    <th class="w-[190px] px-6 py-3 text-right ">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600 bg-white">
                @foreach ($receptionists as $receptionist)
                <tr class="border border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 font-medium text-center border ">
                        {{ $loop->iteration }}.
                    </td>
                    <td class="px-6 py-3 font-medium text-center whitespace-normal ">
                        {{ $receptionist->username }}
                    </td>
                    <td class="px-6 py-3 font-bold text-center ">
                        {{ $receptionist->name }}
                    </td>
                    <td class="px-6 py-3 font-medium text-center whitespace-normal ">
                        {{ $receptionist->email }}
                    </td>
                    <td class="flex justify-around px-6 py-4 text-center whitespace-normal ">

                        <label for="edit-{{ $receptionist->id }}"
                            class="btn normal-case bg-white min-h-0 h-[30px] text-[#4634FF] rounded-sm border-[#4634FF] hover:font-medium border px-4 hover:bg-[#4634FF] hover:text-white font-normal">Edit</label>

                        <form method="POST" action="/hotel/admin/receptionist/{{ $receptionist->id }}/delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit"
                                class="px-4 py-1 font-normal text-red-600 bg-white border border-red-600 rounded-sm hover:font-medium hover:bg-red-600 hover:text-white">
                                <span>Delete</span>
                            </button>
                        </form>

                    </td>
                </tr>
                <input type="checkbox" id="edit-{{ $receptionist->id }}" class="modal-toggle" />
                <div class="modal">
                    <div class="relative modal-box">
                        <label for="edit-{{ $receptionist->id }}"
                            class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
                        <h3 class="text-[20px] font-bold border-b-2 pb-2 mb-5">Add New Receptionist</h3>

                        <form action="/hotel/admin/receptionist/{{ $receptionist->id }}/edit" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                @error('name')
                                {{ $message }}
                                @enderror
                                <div class="flex flex-col col-span-3 mb-5">
                                    <label for="name"
                                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                        Name</label>
                                    <input type="text" id="name" name="name" value="{{ $receptionist->name }}" required
                                        class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                                </div>
                                @error('username')
                                {{ $message }}
                                @enderror
                                <div class="flex flex-col col-span-3 mb-5">
                                    <label for="username"
                                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                        Username</label>
                                    <input type="text" id="username" name="username" required
                                        value="{{ $receptionist->username}}"
                                        class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                                </div>
                                @error('email')
                                {{ $message }}
                                @enderror
                                <div class="flex flex-col col-span-3 mb-5">
                                    <label for="email"
                                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                        Email</label>
                                    <input type="email" id="email" name="email" required
                                        value="{{ $receptionist->email}}"
                                        class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                                </div>
                                @error('password')
                                {{ $message }}
                                @enderror
                                <div class="flex flex-col col-span-3 mb-5">
                                    <label for="password"
                                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                        Password</label>
                                    <input type="text" id="password" name="password"
                                        class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                                </div>
                                @error('photo')
                                {{ $message }}
                                @enderror
                                <div class="flex flex-col col-span-3 mb-5">
                                    <label for="photo"
                                        class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                                        Image</label>
                                    <input type="file" name="photo" id="photo"
                                        class="w-full mt-1 file-input file-input-bordered" />
                                </div>
                                <button type="submit"
                                    class="bg-[#4634FF] text-white w-full h-11 text-center align-center rounded-md">Book
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
        </table>

    </div>

</div>

@endsection

@section('scripts')
<script>
    $('.delete-user').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection