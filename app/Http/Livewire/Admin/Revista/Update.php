<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Revista;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $revista;

    public $titulo;
    public $cantidad;
    public $descripcion;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:250',
        'cantidad' => 'required|min:0',        
    ];

    public function mount(Revista $Revista){
        $this->revista = $Revista;
        $this->titulo = $this->revista->titulo;
        $this->cantidad = $this->revista->cantidad;
        $this->descripcion = $this->revista->descripcion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Revista') ]) ]);
        
        $this->revista->update([
            'titulo' => $this->titulo,
            'cantidad' => $this->cantidad,
            'descripcion' => $this->descripcion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.revista.update', [
            'revista' => $this->revista
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Revista') ])]);
    }
}
