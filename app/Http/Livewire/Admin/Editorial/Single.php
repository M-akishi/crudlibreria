<?php

namespace App\Http\Livewire\Admin\Editorial;

use App\Models\Editorial;
use Livewire\Component;

class Single extends Component
{

    public $editorial;

    public function mount(Editorial $Editorial){
        $this->editorial = $Editorial;
    }

    public function delete()
    {
        $this->editorial->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Editorial') ]) ]);
        $this->emit('editorialDeleted');
    }

    public function render()
    {
        return view('livewire.admin.editorial.single')
            ->layout('admin::layouts.app');
    }
}
