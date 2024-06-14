@extends('home')

@section('titulo', 'Perfil')

@section('contenido')
    @php($usuario = \App\Models\User::findOrFail(auth()->id()))

    <div class="card">
        <div class="card-header bg-secondary text-white">
            Información básica
        </div>
        <div class="card-body">
            <div class="text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#fotoDePerfil" title="Ampliar foto de perfil" class="position-relative">
                    <div class="">
                        <img src="{{ $usuario->profile_photo_url }}" class="img-thumbnail rounded-circle object-fit-cover d-inline-block w-25">
                    </div>
                </a>
                <button class="btn btn-danger mt-2"><i class="bi bi-camera"></i> Cambiar imagen</button>
                <div class="modal fade" id="fotoDePerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto de perfil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $usuario->profile_photo_url }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        Nombre: {{ $usuario->name }} <br>
        Correo: {{ $usuario->email }} <br>
        <button class="btn btn-danger"><i class="bi bi-floppy"></i> Guardar</button>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-secondary text-white">
            Cambiar contraseña
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <button class="btn btn-danger"><i class="bi bi-floppy"></i> Cambiar</button>
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush
