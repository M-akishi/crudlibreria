<?php

namespace App\Http\Livewire\Admin\Editorial;

use App\Models\Editorial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $des_editorial;
    
    protected $rules = [
        'des_editorial' => 'required|min:4',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Editorial') ])]);
        
        Editorial::create([
            'des_editorial' => $this->des_editorial,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.editorial.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Editorial') ])]);
    }
}
