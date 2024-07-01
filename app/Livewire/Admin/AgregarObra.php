<?php

namespace App\Livewire\Admin;

use App\Models\Autor;
use App\Models\Obra;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AgregarObra extends Component
{
    public $obra;
    #[Validate()]
    #[Computed()]
    public $autorId;

    #[Validate()]
    public $tipo = '';

    #[Validate()]
    public $contenido;

    protected $listeners = ['cambiar-id-de-autor' => 'updatingAutorId', 'resetear', 'asignar-obra' => 'asignarObra'];

    public function rules() {
        return [
            'contenido' => 'required',
            'autorId' => 'required',
            'tipo' => 'required',
        ];
    }

    public function messages() {
        return [
            'contenido.required' => 'este campo no puede estar en blanco.',
            'autorId.required' => 'El autor no puede estar en blanco.',
            'tipo.required' => 'Seleccione un tipo de obra.',
        ];
    }

    #[On('cambiar-id-de-autor')]
    public function updatingAutorId($AutorId)
    {
        $this->autorId = $AutorId;
        $this->dispatch('autor-id-updated', $AutorId);
    }

    #[On('resetear')]
    public function resetear()
    {
        $this->reset();
    }

    #[On('asignar-obra')]
    public function asignarObra ($obraId) {
        if($obraId)
        {
            $this->obra = Obra::find($obraId);
            $this->autorId = $this->obra->autor_id;
            $this->tipo = $this->obra->tipo;
            $this->contenido = $this->obra->contenido;
            $this->dispatch('autor-id-updated', $this->autorId);
        }
        $this->validate();
    }

    public function agregarObra() {
        $this->validate();

        if(isset($this->obra))
        {
            $this->obra->update([
                'autor_id' => $this->autorId,
                'tipo' => $this->tipo,
                'contenido' => $this->contenido
            ]);

            session()->flash('publicado', 'Se ha guardado correctamente la obra.');
        }
        else
        {
            Obra::create([
                'tipo' => $this->tipo,
                'contenido' => $this->contenido,
                'autor_id' => $this->autorId
            ]);

            session()->flash('publicado', 'Se ha agregado correctamente la obra.');
        }
        $this->dispatch('obraAgregada');
        $this->reset();
    }

    public function render()
    {
        $autores = Autor::all()->sortBy('nombre');
        return view('livewire.admin.agregar-obra', ['autores' => $autores]);
    }
}
