<?php

namespace App\Http\Livewire\Admin\InventarioB;

use App\Models\InventarioB;
use Livewire\Component;

class Single extends Component
{

    public $inventariob;

    public function mount(InventarioB $InventarioB){
        $this->inventariob = $InventarioB;
    }

    public function delete()
    {
        $this->inventariob->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('InventarioB') ]) ]);
        $this->emit('inventariobDeleted');
    }

    public function render()
    {
        return view('livewire.admin.inventariob.single')
            ->layout('admin::layouts.app');
    }
}
