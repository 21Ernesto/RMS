<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rutas Mayas del Suroeste') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        {{-- <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div> --}}

        <div class="flex min-h-screen">
            <div class="hidden min-h-full lg:w-5/6 lg:block">
                <img src="{{ asset('assets/img/fondo.jpg') }}" alt="Imagen" class="w-full h-full" />
            </div>
            <div class="flex flex-col items-center justify-center w-full px-10 bg-gray-100 lg:w-2/6 dark:bg-gray-800">
                {{-- <x-application-logo class="w-20 mb-3 fill-current bg-red-50" /> --}}
                <div class="w-full">
                    {{ $slot }}
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        @livewireScripts
    </body>
</html>
