<?php

namespace App\Http\Livewire\Admin\Movimientoprod;

use App\Models\movimientoprod;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $num_mov;
    public $bod_origen;
    public $bod_destino;
    public $cod_libro;
    public $cantidad;
    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Movimientoprod') ])]);
        
        Movimientoprod::create([
            'num_mov' => $this->num_mov,
            'bod_origen' => $this->bod_origen,
            'bod_destino' => $this->bod_destino,
            'cod_libro' => $this->cod_libro,
            'cantidad' => $this->cantidad,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.movimientoprod.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Movimientoprod') ])]);
    }
}
