<?php

namespace App\Http\Livewire\Admin\Libro_genero;

use App\Models\libro_genero;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $libro_genero;

    public $id_libro;
    public $id_genero;
    
    protected $rules = [
        
    ];

    public function mount(Libro_genero $Libro_genero){
        $this->libro_genero = $Libro_genero;
        $this->id_libro = $this->libro_genero->id_libro;
        $this->id_genero = $this->libro_genero->id_genero;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Libro_genero') ]) ]);
        
        $this->libro_genero->update([
            'id_libro' => $this->id_libro,
            'id_genero' => $this->id_genero,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.libro_genero.update', [
            'libro_genero' => $this->libro_genero
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Libro_genero') ])]);
    }
}
