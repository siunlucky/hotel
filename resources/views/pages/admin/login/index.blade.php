<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-col justify-center min-h-screen bg-gray-100 sm:py-12">
        <div class="p-10 mx-auto xs:p-0 md:w-full md:max-w-md">
            <h1 class="mb-5 text-2xl font-bold text-center">Hotel Admin Login</h1>
            <div class="w-full bg-white divide-y divide-gray-200 rounded-lg shadow">
                <form action="/hotel/auth/login" method="POST">
                    @csrf
                    <div class="px-5 py-7">
                        <label for="username" class="block pb-1 text-sm font-semibold text-gray-600">
                            Username
                        </label>
                        <input type="text" name="username" value="receptionist"
                            class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" />

                        <label for="username" class="block pb-1 text-sm font-semibold text-gray-600">
                            Password
                        </label>
                        <input type="password" name="password" value="receptionist"
                            class="w-full px-3 py-2 mt-1 mb-5 text-sm border rounded-lg" />

                        <button type="submit"
                            class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">Login</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="inline-block w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="py-5">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="text-center sm:text-left whitespace-nowrap">
                            <button
                                class="px-5 py-4 mx-5 text-sm font-normal text-gray-500 transition duration-200 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="inline-block w-4 h-4 align-text-top">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                                <span class="inline-block ml-1">Forgot Password</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>