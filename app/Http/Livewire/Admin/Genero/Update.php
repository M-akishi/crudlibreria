<?php

namespace App\Http\Livewire\Admin\Genero;

use App\Models\Genero;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $genero;

    public $des_generos;
    
    protected $rules = [
        'des_generos' => 'required|min:4',        
    ];

    public function mount(Genero $Genero){
        $this->genero = $Genero;
        $this->des_generos = $this->genero->des_generos;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Genero') ]) ]);
        
        $this->genero->update([
            'des_generos' => $this->des_generos,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.genero.update', [
            'genero' => $this->genero
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Genero') ])]);
    }
}
