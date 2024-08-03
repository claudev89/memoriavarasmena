<?php

namespace App\Livewire\Admin\Includes;

use App\Models\Categoria;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Categorias extends Component
{
    #[Validate()]
    public $categoria;

    public $categoriaAEditar;

    public function rules()
    {
        return [
            'categoria' => ['required', Rule::unique('categorias', 'nombre')->ignore($this->categoria),]
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'El nombre de la categoría no puede estar en blanco.',
            'categoria.unique' => 'Ya existe una categoría con este nombre.',
        ];
    }

    public function agregarCategoria()
    {
        $this->validate();

        if(isset($this->categoriaAEditar))
        {
            $this->categoriaAEditar->update(['nombre' => $this->categoria]);
        }
        else
        {
            Categoria::create(['nombre' => $this->categoria]);
        }
        $this->dispatch('categoria-agregada');
        $this->reset();
    }

    public function editarCategoria($categoriaId)
    {
        $this->categoriaAEditar = Categoria::find($categoriaId);
        $this->categoria = $this->categoriaAEditar->nombre;
    }

    public function eliminarCategoria($categoriaId)
    {
        $categoriaAEliminar = Categoria::find($categoriaId);
        $categoriaAEliminar->delete();
    }

    public function render()
    {
        $categorias = Categoria::all()->sortBy(function ($categoria) {
            return strtolower($categoria->nombre);
        });
        return view('livewire.admin.includes.categorias', ['categorias' => $categorias]);
    }
}
