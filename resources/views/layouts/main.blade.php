<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
</head>

<body>
    @include('.partials.navbar')

    <main class="main-wrapper">
        @include('.partials.navbar-bottom')
        @yield('pages')
    </main>

    @include('.partials.footer')

    @livewireScripts
</body>


</html>