<?php

namespace App\Http\Livewire\Admin\Enciclopedia;

use App\Models\Enciclopedia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $enciclopedia;

    public $titulo;
    public $cantidad;
    public $descripcion;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:250',
        'cantidad' => 'required|min:0',        
    ];

    public function mount(Enciclopedia $Enciclopedia){
        $this->enciclopedia = $Enciclopedia;
        $this->titulo = $this->enciclopedia->titulo;
        $this->cantidad = $this->enciclopedia->cantidad;
        $this->descripcion = $this->enciclopedia->descripcion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Enciclopedia') ]) ]);
        
        $this->enciclopedia->update([
            'titulo' => $this->titulo,
            'cantidad' => $this->cantidad,
            'descripcion' => $this->descripcion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.enciclopedia.update', [
            'enciclopedia' => $this->enciclopedia
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Enciclopedia') ])]);
    }
}
