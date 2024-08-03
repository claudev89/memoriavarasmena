@extends('home')

@section('titulo', 'Publicaciones')

@section('contenido')
    @if(session('publicado'))
        <div class="toast align-items-center text-bg-success border-0 fade show mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {!! session('publicado') !!}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <livewire:admin.includes.categorias />
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#categorias">
            <i class="bi bi-folder"></i> Ver categorías
        </button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#createPost">
            <i class="bi bi-file-earmark-plus"></i> Crear publicación
        </button>
    </div>
    <livewire:admin.createPost />
    <div class="container">
        <livewire:admin.post-d-t />
    </div>

@endsection

