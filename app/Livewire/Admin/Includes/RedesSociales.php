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
        $facebook = RedSocial::where('nombre', 'LIKE', 'Facebook')->first();
        $youtube = RedSocial::where('nombre', 'LIKE', 'YouTube')->first();
        $instagram = RedSocial::where('nombre', 'LIKE', 'Instagram')->first();
        $threads = RedSocial::where('nombre', 'LIKE', 'Threads')->first();
        $x = RedSocial::where('nombre', 'LIKE', 'X')->first();
        $whatsapp = RedSocial::where('nombre', 'LIKE', 'Whatsapp')->first();

        $facebook->update(['url' => $this->facebook]);
        $youtube->update(['url' => $this->youtube]);
        $instagram->update(['url' => $this->instagram]);
        $threads->update(['url' => $this->threads]);
        $x->update(['url' => $this->x]);
        $whatsapp->update(['url' => $this->whatsapp]);

        session()->flash('publicado', 'Cambios guardados correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.includes.redes-sociales');
    }
}
