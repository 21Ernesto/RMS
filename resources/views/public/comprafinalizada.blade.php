@extends('layouts.public')

@section('main')
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4">
                            ¡Felicidades por tu compra exitosa!
                        </h1>
                        <p class="text-center">Revisa tu correo electrónico. Hemos enviado el comprobante de tu compra.</p>

                        <div class="text-sm bg-white">
                            @php
                                $companyName = 'DIM3NSOFT';
                                $companyUrl = 'https://dim3nsoft.com.mx/';
                            @endphp

                            <x-info-company :companyName="$companyName" :companyUrl="$companyUrl" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
