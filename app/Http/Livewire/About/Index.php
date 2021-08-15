<?php

namespace App\Http\Livewire\About;

use App\Models\About;
use Livewire\Component;

class Index extends Component
{
    public $about;
    public $text;

    public function mount()
    {
        $this->text = About::first();
    }

    public function update()
    {
        $this->validate([
            'about' => 'required'
        ]);

        About::UpdateorCreate([
            'id' => 1
        ], [
            'about_text' => $this->about
        ]);

        $this->text = About::first();
        return back()
            ->with('message', 'About text updated successfully');
    }

    public function render()
    {
        return view('livewire.about.index');
    }
}
