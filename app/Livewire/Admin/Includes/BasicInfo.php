<?php

namespace App\Livewire\Admin\Includes;

use http\Env;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Config;
use App\Models\Info;
use Livewire\WithFileUploads;

class BasicInfo extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $appName;

    #[Validate()]
    public $logo;

    public $quienesSomos;

    public $info;

    public function rules()
    {
        return
            [
                'appName' => 'required',
                'logo' => 'image|max:8192',
                'quienesSomos' => 'required'
            ];
    }

    public function messages()
    {
        return
            [
                'appName.required' => 'El nombre de la página no puede estar en blanco.',
                'logo.image' => 'Archivo de imagen no válido.',
                'logo.max' => 'El logo no puede pesar más de 8MB.'
            ];
    }

    public function mount()
    {
        $this->info = Info::find(1);

        $this->appName = $this->info->nombre;
        $this->quienesSomos = $this->info->quienes_somos;
        $this->logo = $this->info->logo;
    }

    public function create()
    {
        if($this->logo) {
            $validated['logo'] = $this->logo->store('uploads', 'public');
        }
    }

    public function guardarCambios()
    {
        //$this->validate();

        $updateData = [];

        if($this->appName) {
            $updateData['nombre'] = $this->appName;
        }

        if($this->quienesSomos) {
            $updateData['quienes_somos'] = $this->quienesSomos;
        }

        if($this->logo instanceof \Illuminate\Http\UploadedFile) {
            $updateData['logo'] = $this->logo->store('uploads', 'public');
        }

        $this->info->update($updateData);
        session()->flash('publicado', 'Cambios guardados correctamente.');


    }

    public function render()
    {
        return view('livewire.admin.includes.basic-info');
    }
}
