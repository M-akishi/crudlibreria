<?php

namespace App\Http\Livewire\Admin\Enciclopedia;

use App\Models\Enciclopedia;
use Livewire\Component;

class Single extends Component
{

    public $enciclopedia;

    public function mount(Enciclopedia $Enciclopedia){
        $this->enciclopedia = $Enciclopedia;
    }

    public function delete()
    {
        $this->enciclopedia->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Enciclopedia') ]) ]);
        $this->emit('enciclopediaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.enciclopedia.single')
            ->layout('admin::layouts.app');
    }
}
