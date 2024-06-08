@extends('layouts.public')

@section('main')
    <div>
        <div class="slider-area style-2">
            <div class="slider-arrow-btn-wrapper">
                <button type="button" class="header-slider-arrow-btn prev-btn" id="trigger_header_slider_prev"><i
                        class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="header-slider-arrow-btn next-btn" id="trigger_header_slider_next"><i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="slider-wrapper" id="slider-wrapper">
                <div class="single-slider-wrapper">
                    <div class="single-slider " style="background-image: url('assets/img/slide/1.jpg')">
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="order-2 col-md-6 align-self-center order-md-1">
                                    <div class="slider-content-wrapper">
                                        <div class="slider-content">
                                            <span class="slider-short-title">Rutas Mayas del Sureste</span>
                                            <h1 class="slider-title">Cañón del Sumidero</h1>
                                            <p class="slider-short-desc">Explora este impresionante cañón que se eleva a más
                                                de 1,000 metros sobre el nivel del mar.</p>
                                            <div class="slider-btn-wrapper"><a href="{{ route('contacto') }}"
                                                    class="theme-btn style-2">Contacto</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider-wrapper">
                    <div class="single-slider" style="background-image: url('assets/img/slide/2.jpg')">
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="order-2 col-md-6 align-self-center order-md-1">
                                    <div class="slider-content-wrapper">
                                        <div class="slider-content">
                                            <span class="slider-short-title">Rutas Mayas del Sureste</span>
                                            <h1 class="slider-title">Cascadas de Agua Azul</h1>
                                            <p class="slider-short-desc">
                                                Descubre la magia de estas cristalinas aguas turquesas que caen en cascada,
                                                creando un espectáculo visual inolvidable. </p>
                                            <div class="slider-btn-wrapper"><a href="{{ route('contacto') }}"
                                                    class="theme-btn style-2">Contacto</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider-wrapper">
                    <div class="single-slider" style="background-image: url('assets/img/slide/3.jpg')">
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="order-2 col-md-6 align-self-center order-md-1">
                                    <div class="slider-content-wrapper">
                                        <div class="slider-content">
                                            <span class="slider-short-title">Rutas Mayas del Sureste</span>
                                            <h1 class="slider-title">Ciudad Maya Palenque</h1>
                                            <p class="slider-short-desc">Camina entre imponentes templos, como el Templo de
                                                las Inscripciones, que guarda secretos ancestrales.</p>
                                            <div class="slider-btn-wrapper"><a href="{{ route('contacto') }}"
                                                    class="theme-btn style-2">Contacto</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="location-area style-2">
            <div class="container">
                <div class="section-title justify-content-start text-start">
                    <div class="sec-content">
                        <span class="short-title">Paquetes</span>
                        <h2 class="title">Destinos populares</h2>
                        <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                    </div>
                </div>
                <div class="isotope-grid">
                    <div class="row">
                        @forelse ($outstandings as $outstanding)
                            <div class="mb-4 col-md-4 masonry-portfolio-item wow fadeInUp" data-wow-delay="0s">
                                <div class="location-card style-1">
                                    <div class="image-wrapper">
                                        <a class="image-inner">
                                            <img src="{{ asset($outstanding->image) }}" alt="{{ $outstanding->name }}">
                                        </a>
                                    </div>
                                    <div class="content-wrapper">
                                        <div class="content-inner">
                                            <h3 class="content-title"><a>{{ $outstanding->name }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay paquetes populares por el momento</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="why-choose-us-area style-3">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay=".4s">
                        <div class="section-title">
                            <div class="sec-content">
                                <span class="short-title">Promociones</span>
                                <h2 class="title">Todo el tiempo tenemos promociones</h2>
                                <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                            </div>
                            <div class="sec-desc">
                                <p class="desc">Los destinos más bellos al 2 X 1</p>
                            </div>
                            <div class="sec-btn">
                                {{-- <a class="theme-btn">Promociones</a=> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 align-self-center wow fadeInDown" data-wow-delay=".6s">
                        <div class="image-wrapper">
                            <img src="{{ asset('assets/img/choose-us-img-2.png') }}" alt="Choose Us Image">
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInRight" data-wow-delay=".4s">
                        <div class="info-wrapper">
                            <div class="info-card style-1">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('assets/img/icon/folding-map.png') }}" alt="Icon">
                                </div>
                                <div class="content">
                                    <h6 class="title">Descubre Destinos Únicos</h6>
                                    <p class="desc">Desde playas paradisíacas hasta ciudades históricas, tu próximo viaje
                                        comienza aquí.</p>
                                </div>
                            </div>
                            <div class="info-card style-1">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('assets/img/icon/ticket.png') }}" alt="Icon">
                                </div>
                                <div class="content">
                                    <h6 class="title">Experiencias a Medida</h6>
                                    <p class="desc">Escapadas románticas o aventuras familiares, diseñamos cada detalle
                                        para
                                        que tu viaje sea inolvidable.</p>
                                </div>
                            </div>
                            <div class="info-card style-1">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('assets/img/icon/calender.png') }}" alt="Icon">
                                </div>
                                <div class="content">
                                    <h6 class="title">Tu Viaje, Nuestra Prioridad</h6>
                                    <p class="desc">Nuestro equipo está comprometido con brindarte un servicio
                                        excepcional y
                                        una experiencia sin preocupaciones.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
