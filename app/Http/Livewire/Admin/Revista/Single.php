<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Revista;
use Livewire\Component;

class Single extends Component
{

    public $revista;

    public function mount(Revista $Revista){
        $this->revista = $Revista;
    }

    public function delete()
    {
        $this->revista->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Revista') ]) ]);
        $this->emit('revistaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.revista.single')
            ->layout('admin::layouts.app');
    }
}
