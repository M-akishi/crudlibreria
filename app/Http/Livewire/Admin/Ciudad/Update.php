<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $ciudad;

    public $des_ciudad;
    
    protected $rules = [
        'des_ciudad' => 'required|min:4',        
    ];

    public function mount(Ciudad $Ciudad){
        $this->ciudad = $Ciudad;
        $this->des_ciudad = $this->ciudad->des_ciudad;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Ciudad') ]) ]);
        
        $this->ciudad->update([
            'des_ciudad' => $this->des_ciudad,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.ciudad.update', [
            'ciudad' => $this->ciudad
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Ciudad') ])]);
    }
}
