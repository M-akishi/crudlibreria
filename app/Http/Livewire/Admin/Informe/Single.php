<?php

namespace App\Http\Livewire\Admin\Informe;

use App\Models\Informe;
use Livewire\Component;

class Single extends Component
{

    public $informe;

    public function mount(Informe $Informe){
        $this->informe = $Informe;
    }

    public function delete()
    {
        $this->informe->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Informe') ]) ]);
        $this->emit('informeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.informe.single')
            ->layout('admin::layouts.app');
    }
}
