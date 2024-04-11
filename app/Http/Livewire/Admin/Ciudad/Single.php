<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Ciudad;
use Livewire\Component;

class Single extends Component
{

    public $ciudad;

    public function mount(Ciudad $Ciudad){
        $this->ciudad = $Ciudad;
    }

    public function delete()
    {
        $this->ciudad->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Ciudad') ]) ]);
        $this->emit('ciudadDeleted');
    }

    public function render()
    {
        return view('livewire.admin.ciudad.single')
            ->layout('admin::layouts.app');
    }
}
