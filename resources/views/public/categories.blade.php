@extends('layouts.public')

@section('main')
    <div>
        <div class="container mb-4">
            <div class="row">
                <div class="mb-4 col-md-12">
                    <h3 class="title">{{ $category->name }}</h3>
                    <img class="bottom-shape" src="{{ asset('assets/img/bottom-bar.png') }}" alt="Bottom Shape">
                </div>
                <div class="row">
                    @forelse ($category->trips as $trip)
                        <div class="mb-4 col-md-4 masonry-portfolio-item wow fadeInUp" data-wow-delay="0s">
                            <div class="location-card style-1" style="height: 400px; width: auto; overflow: hidden;">
                                <div class="image-wrapper" style="height: 400px; width: auto;">
                                    <a href="{{ route('trip.show', ['slug' => $trip->slug]) }}" class="image-inner">
                                        <img src="{{ asset($trip->front_page) }}" alt="{{ $trip->name }}"
                                            style="height: 400px; width: auto; object-fit: fill;">
                                    </a>
                                </div>
                                <div class="content-wrapper" style="height: 100px; overflow: hidden;">
                                    <div class="content-inner">
                                        <h6>
                                            <a
                                                href="{{ route('trip.show', ['slug' => $trip->slug]) }}">{{ $trip->name }}</a>
                                        </h6>
                                        <a href="{{ route('trip.show', ['slug' => $trip->slug]) }}" class="icon"><i
                                                class="icon-up-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay viajes disponibles en esta categoría.</p>
                    @endforelse

                </div>
            </div>
        </div>

    </div>
@endsection
