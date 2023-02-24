<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/flatpickr/css/flatpickr.min.css') }}">
    <script src="{{ asset('assets/flatpickr/js/flatpickr.js') }}"></script>
</head>

<body>
    <div>
        @include('partials.navbar-admin')
        <div class="flex pt-16 overflow-hidden bg-white">
            @include('partials.sidebar')
            <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
            <div id="main-content" class="relative w-full h-full overflow-y-auto bg-[#F3F3F9] lg:ml-64">
                <main>
                    @yield('pages')
                </main>
                <p class="my-10 text-sm text-center text-gray-500">
                    &copy; 2019-2021 <a href="#" class="hover:underline" target="_blank">Themesberg</a>. All rights
                    reserved.
                </p>
            </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js">
        </script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js">
        </script>
    </div>
    @livewireScripts

    @yield('scripts')
</body>


</html>