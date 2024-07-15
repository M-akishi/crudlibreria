<?php

namespace App\Http\Livewire\Admin\InventarioB;

use App\Models\InventarioB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $inventariob;

    public $id_libro;
    public $id_bodega;
    public $cantidad;
    
    protected $rules = [
        'id_libro' => 'required',
        'id_bodega' => 'required',
        'cantidad' => 'required',        
    ];

    public function mount(InventarioB $InventarioB){
        $this->inventariob = $InventarioB;
        $this->id_libro = $this->inventariob->id_libro;
        $this->id_bodega = $this->inventariob->id_bodega;
        $this->cantidad = $this->inventariob->cantidad;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('InventarioB') ]) ]);
        
        $this->inventariob->update([
            'id_libro' => $this->id_libro,
            'id_bodega' => $this->id_bodega,
            'cantidad' => $this->cantidad,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.inventariob.update', [
            'inventariob' => $this->inventariob
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('InventarioB') ])]);
    }
}
