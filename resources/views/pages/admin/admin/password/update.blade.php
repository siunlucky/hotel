@extends('layouts.receptionist-main')

@section('pages')
<div class="h-auto px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Password Setting</h1>
    <div class="grid grid-cols-4 gap-7">
        <div class="bg-white rounded-md h-fit">
            <div class="bg-[#AFAFAF] flex rounded-t-md p-5 items-center">
                <img src="/storage/profilePhoto/{{ auth()->user()->photo }}"
                    class="object-cover object-center rounded-full w-[70px] h-[70px]" alt="">
                <h4 class="ml-4 text-[20px] font-semibold text-white">Admin</h4>
            </div>
            <ul>
                <li class="flex justify-between px-5 py-2 text-[15px] border border-[#20202020]">
                    Name
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->name }}</span>
                </li>
                <li class="flex justify-between px-5 py-2 text-[15px] border border-[#20202020]">
                    Username
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->username }}</span>
                </li>
                <li class="flex justify-between px-5 py-2 rounded-b-md text-[15px] border border-[#20202020]">
                    Email
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->email }}</span>
                </li>

            </ul>
        </div>
        <div class="col-span-3 bg-white rounded-md">
            <div class="p-4 card">
                <h5 class="pb-2 border-b mb-[50px] text-[20px] font-semibold">Change Password</h5>
                <form action="/hotel/admin/changePassword/{{ auth()->user()->id }}/update" method="POST">
                    @csrf
                    <input type="hidden">
                    <div class="mb-5 ">
                        <div class="mb-4">
                            <label for="Password" class="font-semibold">
                                Password <span class="text-red-600">*</span>
                            </label>
                            <input type="password" name="current_password"
                                class="block w-full text-[16px] px-5 py-2 mt-1 text-lg bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                        </div>
                        <div class="mb-4">
                            <label for="New Password" class="font-semibold">
                                New Password <span class="text-red-600">*</span>
                            </label>
                            <input type="password" name="new_password"
                                class="block w-full text-[16px] px-5 py-2 mt-1 text-lg bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                        </div>
                        <div class="mb-4">
                            <label for="Confirm Password" class="font-semibold">
                                Confirm Password <span class="text-red-600">*</span>
                            </label>
                            <input type="password" name="confirm_password"
                                class="block w-full text-[16px] px-5 py-2 mt-1 text-lg bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                        </div>
                    </div>
                    <button class="bg-[#4634FF] w-full p-3 text-white font-semibold rounded-md">Submit</button>
                </form>

            </div>

        </div>
    </div>


</div>

@endsection
