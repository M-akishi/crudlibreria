<?php

namespace App\Http\Livewire\Admin\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $region_id;
    public $ciudad_id;
    public $direccion;
    
    protected $rules = [
        'direccion' => 'required',
        'region_id' => 'required',
        'ciudad_id' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Sucursal') ])]);
        
        Sucursal::create([
            'region_id' => $this->region_id,
            'ciudad_id' => $this->ciudad_id,
            'direccion' => $this->direccion,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.sucursal.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Sucursal') ])]);
    }
}
