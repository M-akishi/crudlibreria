<?php

namespace App\Http\Livewire\Admin\Genero;

use App\Models\Genero;
use Livewire\Component;

class Single extends Component
{

    public $genero;

    public function mount(Genero $Genero){
        $this->genero = $Genero;
    }

    public function delete()
    {
        $this->genero->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Genero') ]) ]);
        $this->emit('generoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.genero.single')
            ->layout('admin::layouts.app');
    }
}
