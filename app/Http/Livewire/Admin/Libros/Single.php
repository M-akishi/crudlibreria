<?php

namespace App\Http\Livewire\Admin\Libros;

use App\Models\Libros;
use Livewire\Component;

class Single extends Component
{

    public $libros;

    public function mount(Libros $Libros){
        $this->libros = $Libros;
    }

    public function delete()
    {
        $this->libros->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Libros') ]) ]);
        $this->emit('librosDeleted');
    }

    public function render()
    {
        return view('livewire.admin.libros.single')
            ->layout('admin::layouts.app');
    }
}
