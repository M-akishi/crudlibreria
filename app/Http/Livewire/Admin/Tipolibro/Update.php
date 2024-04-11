<?php

namespace App\Http\Livewire\Admin\Tipolibro;

use App\Models\Tipolibro;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $tipolibro;

    public $des_tipo;
    
    protected $rules = [
        'des_tipo' => 'required|min:4',        
    ];

    public function mount(Tipolibro $Tipolibro){
        $this->tipolibro = $Tipolibro;
        $this->des_tipo = $this->tipolibro->des_tipo;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Tipolibro') ]) ]);
        
        $this->tipolibro->update([
            'des_tipo' => $this->des_tipo,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tipolibro.update', [
            'tipolibro' => $this->tipolibro
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Tipolibro') ])]);
    }
}
