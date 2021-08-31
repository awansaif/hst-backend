<?php

namespace App\Http\Livewire\Editor;

use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:editors,email',
            'password' => 'required|min:8'
        ]);

        Editor::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->reset();

        session()->flash('message', 'Editor added successfully');
    }

    public function render()
    {
        return view('livewire.editor.create');
    }
}
