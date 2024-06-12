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

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#createPost">
            <i class="bi bi-file-earmark-plus"></i> Crear publicación
        </button>
        <livewire:admin.createPost />
    </div>
    <div class="container">
        <livewire:admin.post-d-t />
    </div>

@endsection

