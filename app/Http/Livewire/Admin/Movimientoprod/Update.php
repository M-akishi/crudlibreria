<?php

namespace App\Http\Livewire\Admin\Movimientoprod;

use App\Models\movimientoprod;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $movimientoprod;

    public $num_mov;
    public $bod_origen;
    public $bod_destino;
    public $cod_libro;
    public $cantidad;
    
    protected $rules = [
        
    ];

    public function mount(Movimientoprod $Movimientoprod){
        $this->movimientoprod = $Movimientoprod;
        $this->num_mov = $this->movimientoprod->num_mov;
        $this->bod_origen = $this->movimientoprod->bod_origen;
        $this->bod_destino = $this->movimientoprod->bod_destino;
        $this->cod_libro = $this->movimientoprod->cod_libro;
        $this->cantidad = $this->movimientoprod->cantidad;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Movimientoprod') ]) ]);
        
        $this->movimientoprod->update([
            'num_mov' => $this->num_mov,
            'bod_origen' => $this->bod_origen,
            'bod_destino' => $this->bod_destino,
            'cod_libro' => $this->cod_libro,
            'cantidad' => $this->cantidad,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.movimientoprod.update', [
            'movimientoprod' => $this->movimientoprod
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Movimientoprod') ])]);
    }
}
