<?php

namespace App\Http\Livewire\Admin\Libro_genero;

use App\Models\libro_genero;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $id_libro;
    public $id_genero;
    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Libro_genero') ])]);
        
        Libro_genero::create([
            'id_libro' => $this->id_libro,
            'id_genero' => $this->id_genero,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.libro_genero.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Libro_genero') ])]);
    }
}
