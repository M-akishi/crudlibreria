<?php

namespace App\Http\Livewire\Admin\Informe;

use App\Models\Informe;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $informe;

    
    protected $rules = [
        
    ];

    public function mount(Informe $Informe){
        $this->informe = $Informe;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Informe') ]) ]);
        
        $this->informe->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.informe.update', [
            'informe' => $this->informe
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Informe') ])]);
    }
}
