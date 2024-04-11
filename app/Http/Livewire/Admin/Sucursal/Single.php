<?php

namespace App\Http\Livewire\Admin\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;

class Single extends Component
{

    public $sucursal;

    public function mount(Sucursal $Sucursal){
        $this->sucursal = $Sucursal;
    }

    public function delete()
    {
        $this->sucursal->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Sucursal') ]) ]);
        $this->emit('sucursalDeleted');
    }

    public function render()
    {
        return view('livewire.admin.sucursal.single')
            ->layout('admin::layouts.app');
    }
}
