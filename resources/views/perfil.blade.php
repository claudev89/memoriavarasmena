@extends('home')

@section('titulo', 'Perfil')

@section('contenido')
    @php($usuario = \App\Models\User::findOrFail(auth()->id()))
    <div class="mb-2">
        Rol/es:
        @forelse($usuario->getRoleNames() as $rol)
            @if($rol == 'editor') <span class="badge text-bg-success rounded-pill">Editor</span>
            @elseif($rol == 'admin') <span class="badge text-bg-primary rounded-pill">Administrador</span>
            @endif
        @empty
            <span class="badge text-bg-secondary rounded-pill">Usuario</span>
        @endforelse
    </div>
    @livewire('edit-profile', ['usuarix' => $usuario])

@endsection
