<?php

namespace App\Http\Livewire\Admin\Genero;

use App\Models\Genero;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $des_generos;
    
    protected $rules = [
        'des_generos' => 'required|min:4',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Genero') ])]);
        
        Genero::create([
            'des_generos' => $this->des_generos,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.genero.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Genero') ])]);
    }
}
