<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Publicacion;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class PostDT extends Component
{
    use WithPagination;
    public $search ='';
    #[Url(history: true)]
    public $sortBy = "created_at";
    #[Url(history: true)]
    public $sortDir = "desc";

    public function setSortBy($sortByField) {
        if ( $this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
        }
        $this->sortBy = $sortByField;
    }

    public function deletePost(Post $post)
    {
        $postTitle = $post->titulo;
        $post->delete();
        session()->flash('deleted', 'el post '.$postTitle.' se ha eliminado correctamente.');
    }

    public function updateSearch() {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->reset();
    }

    public function render()
    {
        $query = Publicacion::all();

        if(strlen($this->search) >= 3) {
            $query->where('titulo', 'like', '%'.$this->search.'%');
        }

        $posts = $query->orderBy($this->sortBy, $this->sortDir)->get();

        return view('livewire.admin.post-d-t', ['posts' => $posts]);
    }
}
