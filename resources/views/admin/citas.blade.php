@extends('home')

@section('titulo', 'Citas')

@section('contenido')
    @livewire('admin.agregar-obra', ['obraId' => null])
    <ul class="nav nav-tabs" id="citas" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="Autores" data-bs-toggle="tab" data-bs-target="#autores-tab-pane" type="button" role="tab" aria-controls="autores-tab-pane" aria-selected="true">Autores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="obras-tab" data-bs-toggle="tab" data-bs-target="#obras-tab-pane" type="button" role="tab" aria-controls="obras-tab-pane" aria-selected="false">
                Obras
            </button>
        </li>
    </ul>
    <div class="tab-content mt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="autores-tab-pane" role="tabpanel" aria-labelledby="autores-tab" tabindex="0">
            @livewire('admin.agregar-autor', ['AutorId' => null])
            <div class="text-end"><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#agregarAutor"><i class="bi bi-person-plus"></i> Agregar autor</button></div>
            @livewire('admin.autores')
        </div>
        <div class="tab-pane fade" id="obras-tab-pane" role="tabpanel" aria-labelledby="obras-tab" tabindex="0">
            <div class="text-end"><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#agregarObra" id="btnAgregarObra"><i class="bi bi-file-earmark-plus"></i> Agregar obra</button></div>
            @livewire('admin.obras')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('#btnAgregarObra').forEach(button => {
                button.addEventListener('click', function () {
                    let autorId = 0;
                    Livewire.dispatch('resetear');
                });
            });
        });
    </script>
@endsection
