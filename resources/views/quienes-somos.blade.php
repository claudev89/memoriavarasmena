@extends('layouts.app')
@section('content')
    @php($quienesSomos = \App\Models\Info::find(1)->quienes_somos)

    <main class="col-12 container">
        <div class="row">
            <div class="row col-lg-8 col-md-7 col-12 mb-3">
                <div class="card p-0">
                    <div class="card-body">
                        <h3 class="card-title text-uppercase">¿Quiénes somos?</h3>
                        <p class="card-text mt-2">{!! $quienesSomos !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-12">
                <div class="sticky-top" style="top: 20px;">
                    @include('includes.sidebar')
                </div>
            </div>
        </div>
    </main>

    <style>
        /* Asegúrate de que el contenedor principal tenga suficiente altura */
        main.container {
            min-height: 100vh; /* O cualquier otra altura adecuada */
        }

    </style>
@endsection
