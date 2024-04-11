<?php

namespace App\Http\Livewire\Admin\Autor;

use App\Models\Autor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $des_autores;
    
    protected $rules = [
        'des_autores' => 'required|min:4',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Autor') ])]);
        
        Autor::create([
            'des_autores' => $this->des_autores,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.autor.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Autor') ])]);
    }
}
