<?php

namespace App\Http\Livewire\Admin\Autor;

use App\Models\Autor;
use Livewire\Component;

class Single extends Component
{

    public $autor;

    public function mount(Autor $Autor){
        $this->autor = $Autor;
    }

    public function delete()
    {
        $this->autor->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Autor') ]) ]);
        $this->emit('autorDeleted');
    }

    public function render()
    {
        return view('livewire.admin.autor.single')
            ->layout('admin::layouts.app');
    }
}
