<?php

namespace App\Http\Livewire\Admin\InventarioB;

use App\Models\InventarioB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $inventariob;

    
    protected $rules = [
        
    ];

    public function mount(InventarioB $InventarioB){
        $this->inventariob = $InventarioB;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('InventarioB') ]) ]);
        
        $this->inventariob->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.inventariob.update', [
            'inventariob' => $this->inventariob
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('InventarioB') ])]);
    }
}
