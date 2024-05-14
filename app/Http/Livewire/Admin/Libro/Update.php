<?php

namespace App\Http\Livewire\Admin\Libro;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $libro;

    public $titulo;
    public $cantidad;
    public $descripcion;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:250',
        'cantidad' => 'required|min:0',        
    ];

    public function mount(Libro $Libro){
        $this->libro = $Libro;
        $this->titulo = $this->libro->titulo;
        $this->cantidad = $this->libro->cantidad;
        $this->descripcion = $this->libro->descripcion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Libro') ]) ]);
        
        $this->libro->update([
            'titulo' => $this->titulo,
            'cantidad' => $this->cantidad,
            'descripcion' => $this->descripcion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.libro.update', [
            'libro' => $this->libro
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Libro') ])]);
    }
}
