<?php

namespace App\Http\Livewire\Admin\Editorial;

use App\Models\Editorial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $editorial;

    public $des_editorial;
    
    protected $rules = [
        'des_editorial' => 'required|min:4',        
    ];

    public function mount(Editorial $Editorial){
        $this->editorial = $Editorial;
        $this->des_editorial = $this->editorial->des_editorial;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Editorial') ]) ]);
        
        $this->editorial->update([
            'des_editorial' => $this->des_editorial,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.editorial.update', [
            'editorial' => $this->editorial
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Editorial') ])]);
    }
}
