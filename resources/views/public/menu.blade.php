@extends('layouts.public')

@section('main')
    <div>
        <div class="page-breadcrumb-area page-bg"
            style="background-image: url('{{ asset('assets/img/tours/image-1.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-wrapper">
                            <div class="page-heading">
                                <h3 class="page-title">{{ $menu->name }}</h3>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                                    <li class="active"><a>{{ $menu->name }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="location-area style-2">
            <div class="container">
                <div class="section-title justify-content-start text-start">
                    <div class="sec-content">
                        <h1>{{ $menu->name }}</h1>
                        <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                    </div>
                </div>
                <div class="isotope-grid">
                    <div class="row">
                        @forelse ($menu->categories as $category)
                            <div class="mb-4 col-md-4 masonry-portfolio-item wow fadeInUp" data-wow-delay="0s">
                                <div class="location-card style-1" style="height: 400px; width: auto; overflow: hidden;">
                                    <div class="image-wrapper" style="height: 400px; width: auto;">
                                        <a href="{{ route('category.show', ['slug' => $category->slug]) }}"
                                            class="image-inner">
                                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                                style="height: 400px; width: auto; object-fit: fill;">
                                        </a>
                                    </div>
                                    <div class="content-wrapper" style="height: 100px; overflow: hidden;">
                                        <div class="content-inner">
                                            <h6><a
                                                    href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                            </h6>
                                            <a href="{{ route('category.show', ['slug' => $category->slug]) }}"
                                                class="icon"><i class="icon-up-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay categorías disponible</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
