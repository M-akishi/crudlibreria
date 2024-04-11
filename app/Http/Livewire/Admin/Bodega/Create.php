<?php

namespace App\Http\Livewire\Admin\Bodega;

use App\Models\Bodega;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $num_bodega;
    public $cod_sucursal;
    
    protected $rules = [
        'num_bodega' => 'required',
        'cod_sucursal' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Bodega') ])]);
        
        Bodega::create([
            'num_bodega' => $this->num_bodega,
            'cod_sucursal' => $this->cod_sucursal,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.bodega.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Bodega') ])]);
    }
}
