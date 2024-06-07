@extends('home')

@section('titulo', 'Publicaciones')

@section('contenido')

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#createPost">
            <i class="bi bi-file-earmark-plus"></i> Crear publicación
        </button>
        <livewire:admin.createPost />
    </div>



@endsection
