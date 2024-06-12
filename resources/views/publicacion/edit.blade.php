@extends('home')

@section('titulo', 'Editando: '.$publicacion->titulo)

@section('contenido')
    @livewire('admin.post-edit', ['publicacion' => $publicacion])
@endsection
