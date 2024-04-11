<?php

namespace App\Http\Livewire\Admin\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $sucursal;

    public $region_id;
    public $ciudad_id;
    public $direccion;
    
    protected $rules = [
        'direccion' => 'required',
        'region_id' => 'required',
        'ciudad_id' => 'required',        
    ];

    public function mount(Sucursal $Sucursal){
        $this->sucursal = $Sucursal;
        $this->region_id = $this->sucursal->region_id;
        $this->ciudad_id = $this->sucursal->ciudad_id;
        $this->direccion = $this->sucursal->direccion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Sucursal') ]) ]);
        
        $this->sucursal->update([
            'region_id' => $this->region_id,
            'ciudad_id' => $this->ciudad_id,
            'direccion' => $this->direccion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.sucursal.update', [
            'sucursal' => $this->sucursal
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Sucursal') ])]);
    }
}
