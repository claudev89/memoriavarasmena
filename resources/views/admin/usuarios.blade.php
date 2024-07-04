@extends('home')

@section('titulo', 'Usuarios')

@section('contenido')
    @livewire('admin.includes.user-list')

    <script>
        $(function() {
            $('.tulti').tooltip();
        });
    </script>
@endsection
