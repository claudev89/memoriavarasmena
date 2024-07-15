<?php

namespace App\Livewire\Admin\Includes;

use Livewire\Component;
use App\Models\RedSocial;

class RedesSociales extends Component
{
    public $facebook;
    public $youtube;
    public $instagram;
    public $threads;
    public $x;
    public $whatsapp;

    public function mount()
    {
        $this->facebook = RedSocial::where('nombre', 'LIKE', 'Facebook')->first()->url;
        $this->youtube = RedSocial::where('nombre', 'LIKE', 'YouTube')->first()->url;
        $this->instagram = RedSocial::where('nombre', 'LIKE', 'Instagram')->first()->url;
        $this->threads = RedSocial::where('nombre', 'LIKE', 'Threads')->first()->url;
        $this->x = RedSocial::where('nombre', 'LIKE', 'X')->first()->url;
        $this->whatsapp = RedSocial::where('nombre', 'LIKE', 'WhatsApp')->first()->url;
    }

    public function guardarCambios()
    {
        if ($this->threads != '') {
            // guardar y hacer lo mismo con el resto de las variables.
        }
    }

    public function render()
    {
        return view('livewire.admin.includes.redes-sociales');
    }
}
