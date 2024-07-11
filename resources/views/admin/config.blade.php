@extends('home')

@section('titulo', 'Configuración')

@section('contenido')
    @livewire('admin.includes.basic-info')
    @livewire('admin.includes.carrusel')
    @livewire('admin.includes.redes-sociales')
    @livewire('admin.includes.pie-de-pagina')

    <p>Configuración de la página</p>
    <ul>
        <li>Footer</li>
        <li>Texto para mostrar y dirección de correo para recibir el mensaje de contáctanos</li>
    </ul>

    <script>
        $(function() {
            $('.tulti').tooltip();
        });
    </script>
@endsection
