<?php

namespace App\Livewire\Admin\Includes;

use Livewire\Component;
use App\Models\Info;

class PieDePagina extends Component
{
    public $pieDePagina = '';

    public function mount()
    {
        $this->pieDePagina = Info::find(1)->footer;
    }

    public function guardarCambios()
    {
        $footer = Info::find(1);

        $footer->update([
            'footer' => $this->pieDePagina
        ]);
        session()->flash('publicado', 'Pie de página guardado correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.includes.pie-de-pagina');
    }
}
