@extends('layouts.public')

@section('main')
    <div class="page-breadcrumb-area page-bg" style="background-image: url('{{ asset($trip->banner) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <div class="page-heading">
                            {{-- <h3 class="page-title">{!! $trip->name !!}</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-area tour-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-details-wrapper">

                    <article class="single-post-item">
                        <div class="post-title-wrapper">
                            <h3 class="post-title">
                                <a>{!! $trip->name !!}</a>
                            </h3>

                        </div>
                        <div class="post-meta style-2">
                            <div class="post-meta-inner">
                                <div class="time-info">
                                    <i class="fa-solid fa-clock"></i>
                                    <p class="time">{!! $trip->day !!} Días</p>
                                </div>
                            </div>
                        </div>
                        @if ($trip->itineraries->isNotEmpty())
                            <h4>Itinerario</h4>
                            <div class="post-card-divider"></div>
                            <div class="post-card-faq">
                                <div class="accordion-wrapper style-two">
                                    <div class="accordion-box-wrapper" style="width: 100% !important;" id="appointmentAreaStyle1FAQ">
                                        @forelse ($trip->itineraries as $index => $itinerario)
                                            <div class="accordion-list-item">
                                                <div id="headingThree{{ $index }}">
                                                    <div class="accordion-head collapsed" role="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThree{{ $index }}"
                                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                        aria-controls="collapseThree{{ $index }}">
                                                        <h6 class="accordion-title">
                                                            <strong>
                                                                {!! $itinerario->title !!}
                                                            </strong>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div id="collapseThree{{ $index }}" role="button"
                                                    class="accordion-collapse collapse{{ $index === 0 ? 'show' : '' }}"
                                                    aria-labelledby="headingThree{{ $index }}"
                                                    data-bs-parent="#appointmentAreaStyle1FAQ">
                                                    <div class="accordion-item-body">
                                                        <div
                                                            style="display: block; text-align: justify; font-size: 14px !important;">
                                                            {!! $itinerario->description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($trip->messages->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Mensaje</h4>
                            @forelse ($trip->messages as $message)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $message->description !!}
                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif

                        <div class="row">
                            <div class="post-card-divider"></div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    @if ($trip->includes->isNotEmpty())
                                        <h4>Incluye</h4>
                                        <ul style="list-style-type: none; padding-left: 0;">
                                            @forelse ($trip->includes as $incluide)
                                                <li
                                                    style="text-decoration: none !important; display: flex; align-items: center;  margin-bottom: 5px;">
                                                    <i class="fas fa-check-circle"
                                                        style="color: blue; font-size: 14px;"></i>
                                                    <span
                                                        style="margin-left: 15px; font-size: 14px;">{!! $incluide->description !!}</span>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div>
                                    @if ($trip->excludeds->isNotEmpty())
                                        <h4>No Incluye</h4>
                                        <ul style="list-style-type: none; padding-left: 0;">
                                            @forelse ($trip->excludeds as $excluded)
                                                <li
                                                    style="text-decoration: none !important; display: flex; align-items: center; margin-bottom: 5px;">
                                                    <i class="fas fa-times-circle" style="color: red; font-size: 14px;"></i>
                                                    <span
                                                        style="margin-left: 15px; font-size: 14px;">{!! $excluded->description !!}</span>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($trip->recommendations->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Recomendaciones</h4>
                            @forelse ($trip->recommendations as $recommendation)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $recommendation->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif

                        @if ($trip->suggestions->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Sugerencias</h4>
                            @forelse ($trip->suggestions as $suggestion)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $suggestion->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif

                        @if ($trip->schedules->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Horarios</h4>
                            @forelse ($trip->schedules as $schedule)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $schedule->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif
                        @if ($trip->highSeasons->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Temprada alta</h4>
                            @forelse ($trip->highSeasons as $highSeason)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $highSeason->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif
                        @if ($trip->lowSeasons->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Temporada baja</h4>
                            @forelse ($trip->lowSeasons as $lowSeason)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $lowSeason->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif
                        @if ($trip->foods->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Alimentación</h4>
                            @forelse ($trip->foods as $food)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $food->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif
                        @if ($trip->notes->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Notas</h4>
                            @forelse ($trip->notes as $note)
                                <ul>
                                    <li style="font-size: 14px !important; margin-bottom: -35px;">
                                        {!! $note->description !!}

                                    </li>
                                </ul>
                            @empty
                            @endforelse
                        @endif

                        @if ($trip->images->isNotEmpty())
                            <div class="post-card-divider"></div>
                            <h4>Galería</h4>
                            <div class="row">
                                @forelse ($trip->images as $image)
                                    <div class="col-md-6 gallery-user">
                                        <div class="mb-3">
                                            <img src="{{ asset($image->image) }}" class="rounded img-fluid"
                                                style="height: 400px; width: 100%; object-fit: fill;" alt="image">
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-6">
                                    </div>
                                @endforelse
                            </div>
                            <div class="post-card-divider"></div>
                        @endif

                    </article>

                </div>

                <div class="col-lg-4">

                    @if ($trip->type_trips == 'tour' || $trip->type_trips == 'friendscombos')
                        @livewire('tour-form', ['trip' => $trip])
                    @endif
                    @if ($trip->type_trips == 'packages' || $trip->type_trips == 'mayantrains' || $trip->type_trips == 'travelpackages'  )
                        @livewire('package-form', ['trip' => $trip])
                    @endif
                    @if ($trip->type_trips == 'promotions')
                        @livewire('promo-form', ['trip' => $trip])
                    @endif


                </div>
            </div>
        </div>

    </div>

@endsection
