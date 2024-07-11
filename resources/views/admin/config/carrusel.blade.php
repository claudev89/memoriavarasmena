@extends('home')

@section('titulo', 'Carrusel de imágenes')

@section('contenido')
    @livewire('admin.includes.carrusel')

    <script>
        $(function() {
            $('.tulti').tooltip();
        });
    </script>
@endsection
