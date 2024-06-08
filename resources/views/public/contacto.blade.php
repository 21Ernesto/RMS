@extends('layouts.public')

@section('main')
    <div>
        <div class="page-breadcrumb-area page-bg" style="background-image: url('assets/img/tours/image-1.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-wrapper">
                            <div class="page-heading">
                                <h3 class="page-title">Contacto</h3>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                                    <li class="active"><a>Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-info-area">
            <div class="container">
                <div class="row gx-xl-5 gy-4">
                    <div class="col-xl-4 col-md-6">
                        <div class="icon-card style-2">
                            <div class="icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Teléfono</h2>
                                <div class="info">
                                    <a href="tel:9161291321" class="desc"> 916-129-1321</a>
                                    <a href="tel:9163412188" class="desc"> 916-341-2188</a>
                                    <a href="tel:9161291321" class="desc">916-129-1321</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="icon-card style-2">
                            <div class="icon">
                                <i class="fa-solid fa-calendar"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Email</h2>
                                <div class="info">
                                    <a href="mailto:rutasdelsureste@live.com.mx"
                                        class="desc">rutasdelsureste@live.com.mx</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="icon-card style-2">
                            <div class="icon">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Dirección</h2>
                                <div class="info">
                                    <span class="address-desc">Dirección: Av. 27, Juárez, Centro, <br>29960 Palenque,
                                        Chiapas.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form-area">
            <div class="container">
                <div class=" row gy-5">
                    <div class="col-lg-5 justify-content-center">
                        <div class="video-modal-card style-1">
                            <div class="image-wrapper">
                                <img src="{{ asset('assets/img/contact/image-1.jpg') }}" alt="Video Modal">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="comment-respond">
                            <form action="{{ route('formulario.enviar') }}" method="post" class="comment-form">
                                @csrf
                                <div class="row g-4">
                                    <h3>¿Quieres un viaje personalizado?</h3>
                                    <div class="col-xl-6">
                                        <div class="contacts-name">
                                            <label for="author">Nombre</label>
                                            <input name="author" id="author" type="text" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contacts-email">
                                            <label for="email">Email</label>
                                            <input name="email" id="email" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contacts-phone">
                                            <label for="phone">Número de personas</label>
                                            <input name="phone" id="phone" type="text" placeholder="Número de personas">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contacts-subject">
                                            <label for="subject">Fecha aproximada</label>
                                            <input name="subject" id="subject" type="text" placeholder="Fecha aproximada">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contacts-message">
                                            <label for="comment">Mensaje</label>
                                            <textarea name="comment" id="comment" cols="20" rows="3" placeholder="Mensaje"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="theme-btn" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
