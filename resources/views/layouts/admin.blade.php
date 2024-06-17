@props(['breadcrumb' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rutas Mayas del Sureste') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/12b516948a.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


    <!-- Styles -->
    @livewireStyles
</head>

<body x-data="{ open: false }" :class="{ 'overflow-hidden': open, }" class="sm:overflow-auto bg-gray-100 dark:bg-gray-100">

    @include('layouts.includes.admin.navigation')
    @include('layouts.includes.admin.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-20">
            @include('layouts.includes.admin.breadcrumb')
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg -:border-gray-700">
                {{ $slot }}
            </div>

        </div>
    </div>

    <div x-cloak x-show="open" x-on:click="open= false" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 sm:hidden">
    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')
    @yield('scripts')


</body>

</html>
