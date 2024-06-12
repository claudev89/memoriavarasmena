<?php

namespace App\Livewire;

use App\Models\publicacion;
use Livewire\Component;
use Livewire\WithPagination;

class PostPreview extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->publicaciones = publicacion::orderBy('created_at', 'DESC')->paginate(6);

        return view('livewire.post-preview', ['publicaciones' => $this->publicaciones]);
    }
}
