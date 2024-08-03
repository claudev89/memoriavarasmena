<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\publicacion;
use Livewire\Component;
use Livewire\WithPagination;
class PostPreview extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $categoriaSeleccionada;

    public function render()
    {
        if($this->categoriaSeleccionada == 0) {
            $this->publicaciones = publicacion::orderBy('created_at', 'DESC')->paginate(6);
        }
        else {
            $this->resetPage();
            $this->publicaciones = publicacion::where('categoria_id', $this->categoriaSeleccionada)
                ->orderBy('created_at', 'DESC')->paginate(6);
        }

        $categorias = Categoria::all()->sortBy(function ($categoria) {
            return strtolower($categoria->nombre);
        });

        return view('livewire.post-preview', ['publicaciones' => $this->publicaciones,
            'categorias' => $categorias]);
    }
}
