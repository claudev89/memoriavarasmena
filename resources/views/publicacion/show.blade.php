@extends('layouts.app')
@section('content')

    <main class="col-12 container">
        <div class="row">
            <div class="row col-lg-8 col-md-7 col-12 mb-3">
                <div class="card p-0">
                    <div class="card-body">
                        <h3 class="card-title text-uppercase">{{ $publicacion->titulo }}</h3>
                        <span class="small text-secondary">Publicado el {{ \Carbon\Carbon::parse($publicacion->created_at)->translatedFormat('j \\de F \\de Y \\a \\l\\a\\s H:i \\h\\r\\s') }}.</span>
                        <p><img src="{{ asset('storage/'.$publicacion?->imagen) }}" class="img-fluid mt-2"></p>
                        <p class="card-text mt-2">{!! $publicacion->cuerpo !!}</p>
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
