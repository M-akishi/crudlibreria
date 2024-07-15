<?php

namespace App\Http\Livewire\Admin\Libros;

use App\Models\Libros;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $titulo;
    public $tipo_libro;
    public $autor_code;
    public $des_libro;
    public $genero_code;
    public $editorial_code;
    
    protected $rules = [
        'titulo' => 'required',
        'tipo_libro' => 'required',
        'autor_code' => 'required',
        'des_libro' => 'required',
        'genero_code' => 'required',
        'editorial_code' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Libros') ])]);
        
        Libros::create([
            'titulo' => $this->titulo,
            'tipo_libro' => $this->tipo_libro,
            'autor_code' => $this->autor_code,
            'des_libro' => $this->des_libro,
            'genero_code' => $this->genero_code,
            'editorial_code' => $this->editorial_code,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.libros.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Libros') ])]);
    }
}
