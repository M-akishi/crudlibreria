<?php

namespace App\Http\Livewire\Admin\Libro_genero;

use App\Models\libro_genero;
use Livewire\Component;

class Single extends Component
{

    public $libro_genero;

    public function mount(Libro_genero $Libro_genero){
        $this->libro_genero = $Libro_genero;
    }

    public function delete()
    {
        $this->libro_genero->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Libro_genero') ]) ]);
        $this->emit('libro_generoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.libro_genero.single')
            ->layout('admin::layouts.app');
    }
}
