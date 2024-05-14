<?php

namespace App\Http\Livewire\Admin\Libro;

use App\Models\Libro;
use Livewire\Component;

class Single extends Component
{

    public $libro;

    public function mount(Libro $Libro){
        $this->libro = $Libro;
    }

    public function delete()
    {
        $this->libro->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Libro') ]) ]);
        $this->emit('libroDeleted');
    }

    public function render()
    {
        return view('livewire.admin.libro.single')
            ->layout('admin::layouts.app');
    }
}
