<?php

namespace App\Http\Livewire\Admin\Movimientoprod;

use App\Models\movimientoprod;
use Livewire\Component;

class Single extends Component
{

    public $movimientoprod;

    public function mount(Movimientoprod $Movimientoprod){
        $this->movimientoprod = $Movimientoprod;
    }

    public function delete()
    {
        $this->movimientoprod->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Movimientoprod') ]) ]);
        $this->emit('movimientoprodDeleted');
    }

    public function render()
    {
        return view('livewire.admin.movimientoprod.single')
            ->layout('admin::layouts.app');
    }
}
