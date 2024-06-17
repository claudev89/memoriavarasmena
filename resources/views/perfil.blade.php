@extends('home')

@section('titulo', 'Perfil')

@section('contenido')
    @php($usuario = \App\Models\User::findOrFail(auth()->id()))
    @livewire('edit-profile', ['usuarix' => $usuario])

@endsection

@push('css')
    <style>

    </style>
@endpush
