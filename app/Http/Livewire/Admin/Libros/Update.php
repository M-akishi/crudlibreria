<?php

namespace App\Http\Livewire\Admin\Libros;

use App\Models\Libros;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $libros;

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

    public function mount(Libros $Libros){
        $this->libros = $Libros;
        $this->titulo = $this->libros->titulo;
        $this->tipo_libro = $this->libros->tipo_libro;
        $this->autor_code = $this->libros->autor_code;
        $this->des_libro = $this->libros->des_libro;
        $this->genero_code = $this->libros->genero_code;
        $this->editorial_code = $this->libros->editorial_code;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Libros') ]) ]);
        
        $this->libros->update([
            'titulo' => $this->titulo,
            'tipo_libro' => $this->tipo_libro,
            'autor_code' => $this->autor_code,
            'des_libro' => $this->des_libro,
            'genero_code' => $this->genero_code,
            'editorial_code' => $this->editorial_code,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.libros.update', [
            'libros' => $this->libros
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Libros') ])]);
    }
}
