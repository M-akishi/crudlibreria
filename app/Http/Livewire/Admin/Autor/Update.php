<?php

namespace App\Http\Livewire\Admin\Autor;

use App\Models\Autor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $autor;

    public $des_autores;
    
    protected $rules = [
        'des_autores' => 'required|min:4',        
    ];

    public function mount(Autor $Autor){
        $this->autor = $Autor;
        $this->des_autores = $this->autor->des_autores;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Autor') ]) ]);
        
        $this->autor->update([
            'des_autores' => $this->des_autores,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.autor.update', [
            'autor' => $this->autor
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Autor') ])]);
    }
}
