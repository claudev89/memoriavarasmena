<?php

namespace App\Livewire\Admin\Includes;

use Livewire\Component;

class PieDePagina extends Component
{
    public $pieDePagina = '';

    public function render()
    {
        return view('livewire.admin.includes.pie-de-pagina');
    }
}
