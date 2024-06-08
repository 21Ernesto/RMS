@extends('layouts.public')

@section('main')
    <div>
        <div class="page-breadcrumb-area page-bg" style="background-image: url('assets/img/nosotros/about.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-wrapper">
                            <div class="page-heading">
                                <h3 class="page-title">Nosotros</h3>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                                    <li class="active"><a href="#">Nosotros</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- assets/img/nosotros/bg-1.jpg --}}
        <div class="about-us-area style-1" style="background-image: url('../../../public/assets/img/nosotros/bg-1.png')">
            <img class="shape-1 wow zoomInDown" src="{{ asset('assets/img/nosotros/dots.png') }}" alt="Shape">
            <div class="container">
                <div class="about-us-wrapper">
                    <div class="row">
                        <div class="order-2 col-xl-5 order-xl-1 wow fadeInLeft" data-wow-delay=".4s">
                            <div class="about-us-content-wrapper-1">
                                <div class="section-title">
                                    <div class="sec-content">

                                        <h2 class="title">¿Quiénes Somos?</h2>
                                        <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}"
                                            alt="Bottom Shape">
                                    </div>
                                </div>
                                <div class="info-card style-1">

                                    <div class="content">

                                        <p class="desc">Rutas mayas del sureste es una tour operadora dedicada al turismo
                                            receptivo, con más <strong> 100000 viajes</strong> privados, públicos y grupales
                                            cada año siendo una empresa líder con más de dos décadas de experiencia en el
                                            sector turístico. Ofreciendo a nuestros clientes una nueva forma de viajar y
                                            vivir experiencias inolvidables.</p>
                                    </div>
                                </div>
                                <div class="info-card style-1">

                                    <div class="content">
                                        <h6 class="title">Acerca de Nosotros</h6>
                                        <p class="desc">Rutas Mayas Del Sureste es una empresa 100% chiapaneca fundada por
                                            el Sr. Martín Pérez Sánchez gran impulsor en el sector turístico en el estado de
                                            Chiapas, inicio sus operaciones el 4 de diciembre de 1996, como resultado del
                                            espíritu emprendedor y con el propósito mostrar las maravillas del estado
                                            chiapaneco al turismo nacional e internacional, siendo una empresa en constante
                                            innovación brindando el mejor servicio y experiencia a nuestros clientes.
                                            Nuestros agentes se encuentran en constante capacitación para poder brindar una
                                            mejor atención y asesoría de cada uno de nuestros tours. Creamos experiencias,
                                            organizamos viajes a la medida, tours y paquetes vacacionales, gestionamos
                                            reservas de hospedaje y hoteles todo incluido, traslados, tours, entradas y
                                            actividades en los principales destinos turísticos del sureste mexicano. Así
                                            mismo, actualmente contamos con nuestra oficina matriz en la ciudad de palenque,
                                            la cual es la segunda ciudad más importante y visitada en el estado de Chiapas.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="order-1 col-xl-7 order-xl-2 wow fadeInRight" data-wow-delay=".4s">
                            <div class="about-us-image-wrapper-1">
                                <img class="bg-shape" src="{{ asset('assets/img/nosotros/image-wrapper-bg-1.png') }}"
                                    alt="Shape">
                                <div class="image-wrapper style-1">
                                    <img src="{{ asset('assets/img/nosotros/img-1.jpg') }}" alt=" Vacation Image">
                                </div>
                                <div class="image-wrapper style-2">
                                    <img src="{{ asset('assets/img/nosotros/img-2.jpg') }}" alt=" Vacation Image">
                                </div>
                                <div class="image-wrapper style-3">
                                    <img src="{{ asset('assets/img/nosotros/img-3.jpg') }}" alt=" Vacation Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="process-step-area style-1">
            <div class="container">
                <img class="bg-shape" src="{{ asset('assets/img/nosotros/elements.png') }}" alt="Shape">

                <div class="row gy-4">
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                        <div class="process-card style-1">
                            <div class="img-wrapper wow">
                                <img src="{{ asset('assets/img/nosotros/1.png') }}" alt="Shape">
                            </div>
                            <div class="content-wrapper">
                                <h4 class="title">Misión</h4>
                                <p class="desc">Brindar el mejor servicio con el fin de lograr la plena satisfacción de
                                    nuestros clientes, con paquetes turísticos a precios accesibles, así mismo disfruten de
                                    la cultura, sabores y colores de las maravillas más importantes de cada lugar en el
                                    estado de Chiapas y todo el sureste. Además de brindar la mejor asesoría para que
                                    nuestros clientes puedan vivir al máximo cada experiencia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="process-card style-1">
                            <div class="img-wrapper">
                                <img src="{{ asset('assets/img/nosotros/2.png') }}" alt="Shape">
                            </div>
                            <div class="content-wrapper">
                                <h4 class="title">Visión</h4>
                                <p class="desc">Convertirnos en el operador turístico líder en la región brindando
                                    servicios de viajes confiables, de calidad e innovadores a nuestros clientes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="process-card style-1 ">
                            <div class="img-wrapper">
                                <img src="{{ asset('assets/img/nosotros/3.png') }}" alt="Shape">
                            </div>
                            <div class="content-wrapper">
                                <h4 class="title">Valores</h4>
                                <p class="desc">La empresa se basa en la honestidad, el respeto mutuo, el trabajo en
                                    equipo, la responsabilidad, el profesionalismo, la transparencia en las acciones, el
                                    compromiso, el crecimiento, la innovación constante y la importancia de nuestros
                                    clientes para la vitalidad de la empresa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white location-area style-3">
            <div class="container">
                <div class="text-center section-title align-content-center justify-content-center">
                    <div class="sec-content">
                        <h2 class="title">Nuestro Equipo</h2>
                        <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                    </div>
                </div>
                <div class="location-card-wrapper">
                    <div class="row gy-4">
                        @foreach ($equipo as $miembro)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0s">
                                <div class="location-image-card style-2">
                                    <div class="img-wrapper">
                                        <img class="img-fluid" src="{{ asset($miembro->image) }}" alt="Place Image">
                                    </div>
                                    <div class="content-inner">
                                        <h6 class="city">{{ $miembro->name }}</h6>
                                        <p class="duration">{{ $miembro->post }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-white location-area style-3">
            <div class="container">
                <div class="text-center section-title align-content-center justify-content-center">
                    <div class="sec-content">
                        <h2 class="title">Nuestros carros</h2>
                        <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                    </div>
                </div>
                <div class="location-card-wrapper">
                    <div class="row gy-4">
                        @foreach ($cars as $car)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0s">
                                <div class="img-wrapper">
                                    <img class="img-fluid" src="{{ asset($car->image) }}" alt="Place Image">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
