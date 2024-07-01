@extends('layouts.app')
@section('content')
    <header>
        @include('includes.llamadoALaAccion')
        @include('includes.carousel')
    </header>

    <main class="col-12 container">
        <div class="row">
            <div class="row col-lg-8 col-md-7 col-12">
                @php($citas = \App\Models\Obra::inRandomOrder()->limit(2)->get())
                @foreach($citas as $cita)
                    @include('includes.quotes', ['citas' => $citas])
                @endforeach
                <section name="posts" class="my-3">
                    @livewire('post-preview')
                </section>
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
