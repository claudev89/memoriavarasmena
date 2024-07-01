<?php

namespace App\Livewire\Admin;

use App\Models\Obra;
use Livewire\Attributes\On;
use Livewire\Component;

class Obras extends Component
{
    public $searchObra = '';

    #[On('obraAgregada')]
    public function render()
    {
        return view('livewire.admin.obras', ['obras' => Obra::search($this->searchObra)->orderBy('id', 'desc')->get()]);
    }

    public function eliminarObra($obraId) {
        $obra = Obra::find($obraId);
        $autorObra = $obra->autor->nombre;
        $obra->delete();
        session()->flash('publicado', 'Se eliminado correctamente la obra de <strong>'.$autorObra.'</strong>');
    }
}
