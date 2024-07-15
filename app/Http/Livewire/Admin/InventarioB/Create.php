<?php

namespace App\Http\Livewire\Admin\InventarioB;

use App\Models\InventarioB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $id_libro;
    public $id_bodega;
    public $cantidad;
    
    protected $rules = [
        'id_libro' => 'required',
        'id_bodega' => 'required',
        'cantidad' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('InventarioB') ])]);
        
        InventarioB::create([
            'id_libro' => $this->id_libro,
            'id_bodega' => $this->id_bodega,
            'cantidad' => $this->cantidad,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.inventariob.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('InventarioB') ])]);
    }
}
