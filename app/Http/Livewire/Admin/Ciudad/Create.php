<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $des_ciudad;
    
    protected $rules = [
        'des_ciudad' => 'required|min:4',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Ciudad') ])]);
        
        Ciudad::create([
            'des_ciudad' => $this->des_ciudad,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.ciudad.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Ciudad') ])]);
    }
}
