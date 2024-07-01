<?php

namespace App\Livewire\Admin;

use App\Models\Autor;
use Livewire\Component;

class Autores extends Component
{
    public $search = '';

    public function eliminarAutor($autorId) {
        $autorAEliminar = Autor::find($autorId);
        $nombreAutor = $autorAEliminar->nombre;
        $autorAEliminar->delete();

        session()->flash('publicado', 'Se eliminado correctamente el autor: <strong>'.$nombreAutor.'</strong>');
    }

    public function render()
    {
        return view('livewire.admin.autores',[
            'autores' =>  Autor::search($this->search)->orderBy('nombre')->get()
        ]);
    }
}
