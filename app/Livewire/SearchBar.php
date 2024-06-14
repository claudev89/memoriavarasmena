<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\publicacion;

class SearchBar extends Component
{
    public $search = '';
    public function render()
    {
        $resultados = [];

        if(strlen($this->search) >= 3) {
            $resultados = publicacion::where('titulo', 'LIKE', '%'.$this->search.'%')->limit(10)->get();
        }
        return view('livewire.search-bar', ['publicaciones' => $resultados]);
    }
}
