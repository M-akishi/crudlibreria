<?php

namespace App\Http\Livewire\Admin\Tipolibro;

use App\Models\Tipolibro;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $des_tipo;
    
    protected $rules = [
        'des_tipo' => 'required|min:4',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Tipolibro') ])]);
        
        Tipolibro::create([
            'des_tipo' => $this->des_tipo,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.tipolibro.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Tipolibro') ])]);
    }
}
