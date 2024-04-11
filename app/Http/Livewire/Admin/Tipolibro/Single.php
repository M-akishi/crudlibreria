<?php

namespace App\Http\Livewire\Admin\Tipolibro;

use App\Models\Tipolibro;
use Livewire\Component;

class Single extends Component
{

    public $tipolibro;

    public function mount(Tipolibro $Tipolibro){
        $this->tipolibro = $Tipolibro;
    }

    public function delete()
    {
        $this->tipolibro->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Tipolibro') ]) ]);
        $this->emit('tipolibroDeleted');
    }

    public function render()
    {
        return view('livewire.admin.tipolibro.single')
            ->layout('admin::layouts.app');
    }
}
