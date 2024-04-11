<?php

namespace App\Http\Livewire\Admin\Bodega;

use App\Models\Bodega;
use Livewire\Component;

class Single extends Component
{

    public $bodega;

    public function mount(Bodega $Bodega){
        $this->bodega = $Bodega;
    }

    public function delete()
    {
        $this->bodega->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Bodega') ]) ]);
        $this->emit('bodegaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.bodega.single')
            ->layout('admin::layouts.app');
    }
}
