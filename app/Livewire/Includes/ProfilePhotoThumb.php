<?php

namespace App\Livewire\Includes;

use Livewire\Attributes\On;
use Livewire\Component;

class ProfilePhotoThumb extends Component
{
    #[On('datosCambiados')]
    public function render()
    {
        $usuarix = auth()->user();
        $photopath = $usuarix->mostrarFotoDePerfil($usuarix);

        return view('livewire.includes.profile-photo-thumb', ['foto' => $photopath]);
    }
}
