<?php

namespace App\Http\Livewire\Editor;

use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $editorId;
    public $name;
    public $email;
    public $status;
    public $password;

    public function mount($editor)
    {
        $this->editorId = $editor->id;
        $this->name = $editor->name;
        $this->email = $editor->email;
        $this->status = $editor->status;
        $this->password = '';
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:editors,email,' . $this->editorId,

        ]);
        dd($this->status);
        $editor = Editor::findorFail($this->editorId);
        $editor->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ?  Hash::make($this->password) : $editor->password,
            'status' => $this->status
        ]);


        session()->flash('message', 'Editor updated successfully');
    }
    public function render()
    {
        return view('livewire.editor.edit');
    }
}
