<?php

namespace App\Http\Livewire\Admin\Libro;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $titulo;
    public $cantidad;
    public $descripcion;
    
    protected $rules = [
        'descripcion' => 'required|min:10|max:250',
        'cantidad' => 'required|min:0',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Libro') ])]);
        
        Libro::create([
            'titulo' => $this->titulo,
            'cantidad' => $this->cantidad,
            'descripcion' => $this->descripcion,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.libro.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Libro') ])]);
    }
}
