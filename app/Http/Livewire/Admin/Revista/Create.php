<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Revista;
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Revista') ])]);
        
        Revista::create([
            'titulo' => $this->titulo,
            'cantidad' => $this->cantidad,
            'descripcion' => $this->descripcion,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.revista.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Revista') ])]);
    }
}
