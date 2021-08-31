<?php

namespace App\Http\Livewire\ContactUs;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;

class ContactUs extends Component
{
    public $messages;

    public function mount()
    {
        $this->messages = ModelsContactUs::orderBy('id', 'DESC')->get();
    }
    public function remove($id)
    {
        ContactUs::find($id)->delete();
        $this->messages = ModelsContactUs::orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.contact-us.contact-us');
    }
}
