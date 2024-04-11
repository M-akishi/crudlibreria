<?php

namespace App\Http\Livewire\Admin\Bodega;

use App\Models\Bodega;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $bodega;

    public $num_bodega;
    public $cod_sucursal;
    
    protected $rules = [
        'num_bodega' => 'required',
        'cod_sucursal' => 'required',        
    ];

    public function mount(Bodega $Bodega){
        $this->bodega = $Bodega;
        $this->num_bodega = $this->bodega->num_bodega;
        $this->cod_sucursal = $this->bodega->cod_sucursal;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Bodega') ]) ]);
        
        $this->bodega->update([
            'num_bodega' => $this->num_bodega,
            'cod_sucursal' => $this->cod_sucursal,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.bodega.update', [
            'bodega' => $this->bodega
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Bodega') ])]);
    }
}
