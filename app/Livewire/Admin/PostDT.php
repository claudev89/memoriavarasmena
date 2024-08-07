<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Publicacion;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class PostDT extends Component

{
    use WithPagination;

    public $perPage = 15;
    public $search = '';

    #[On('postCreado')]
    public function render()
    {
        if(auth()->user()->hasRole('editor')) {
            $publicaciones = Publicacion::where('user_id', auth()->id())->orderBy('created_at', 'desc')->search($this->search)->paginate($this->perPage);
        }
        elseif (auth()->user()->hasRole('admin')) {
            $publicaciones = Publicacion::orderBy('created_at', 'desc')->search($this->search)->paginate($this->perPage);
        }

        return view('livewire.admin.post-d-t', ['publicaciones' => $publicaciones]);
    }
}
