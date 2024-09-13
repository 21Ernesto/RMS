<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="description" content="Rutas Mayas del Sureste - Agencia de Viajes y Tours">
    <meta name="keywords"
        content="rutas mayas, sureste, viajes, tours, paquetes turísticos, agencia de viajes, aventura, exploración, escapada, guía de viaje, destinos turísticos, cultura maya">

    <meta name="author" content="dim3nsoft">

    <title>{{ config('app.name', 'Rutas Mayas del Sureste') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Fasthand&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .active {
            color: #333;
        }

        /* Estilos personalizados para los iconos flotantes */
        .floating-icons {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }

        .floating-icons a {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            text-align: center;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 50%;
            background-color: #25d366; /* Color de fondo de WhatsApp */
            transition: background-color 0.3s;
        }

        .floating-icons a:hover {
            background-color: #128c7e; /* Color de fondo de WhatsApp al pasar el mouse */
        }
    </style>
</head>

<body class="select-none user-select-none">

    <div id="preloader">
        <div id="preloader-status">
            <img src="{{ asset('assets/img/preloader.gif') }}" alt="Preloader">
        </div>
    </div>

    @include('layouts.header')

    @yield('main')

    @include('layouts.footer')

    <div id="scrollTop" class="scrollup-wrapper">
        <div class="scrollup-btn">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
    </div>

    <!-- WhatsApp Icons -->
    <div class="floating-icons">
        <a href="https://wa.me/529163412188?text=Hola%20necesito%20m%C3%A1s%20informaci%C3%B3n%20de%20rutas%20mayas" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Google Translate -->
    <div id="google_translate_element" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'es'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/inview.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
