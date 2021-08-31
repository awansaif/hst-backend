<?php

namespace App\Http\Livewire\Editor;

use App\Models\Editor as ModelsEditor;
use Livewire\Component;

class Editor extends Component
{
    public $editors;
    public function mount()
    {
        $this->editors = ModelsEditor::orderBy('id', 'DESC')->get();
    }
    public function remove($id)
    {
        ModelsEditor::findorFail($id)->delete();
        $this->editors = ModelsEditor::orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.editor.editor');
    }
}
