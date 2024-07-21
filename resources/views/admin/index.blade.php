@extends('home')

@section('titulo', 'Panel de administración')

@section('contenido')

    @php($usuario = auth()->user())
    @php($publicacionesCtd = $usuario->hasRole('editor') && !$usuario->hasRole('admin') ? \App\Models\publicacion::where('user_id', $usuario->id)->count() : \App\Models\publicacion::count() )
    @php($usuariosCtd = \App\Models\User::count())
    @php($obraCtd = \App\Models\Obra::count())



    <div class="row mx-auto">

        @hasanyrole('admin|editor')
        <div class="card text-white bg-danger me-2 mb-2" style="max-width: 18rem">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="card-title mb-0">{{ $publicacionesCtd }}</h2>
                    <p class="card-text">Publicaciones</p>
                </div>
                <div>
                    <h1><i class="bi bi-file-earmark-fill"></i></h1>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.publicaciones') }}" class="text-white font-weight-bold">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endhasanyrole

        @role('admin')
        <div class="card text-white bg-danger me-2 mb-2" style="max-width: 18rem">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="card-title mb-0">{{ $obraCtd }}</h2>
                    <p class="card-text">Citas</p>
                </div>
                <div>
                    <h1><i class="bi bi-chat-quote-fill"></i></h1>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.citas') }}" class="text-white font-weight-bold">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="card text-white bg-danger mb-2" style="max-width: 18rem">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="card-title mb-0">{{ $usuariosCtd }}</h2>
                    <p class="card-text">Usuarios</p>
                </div>
                <div>
                    <h1><i class="bi bi-people-fill"></i></h1>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.usuarios') }}" class="text-white font-weight-bold">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endrole

    </div>

@endsection
