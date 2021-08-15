<?php

namespace App\Http\Livewire\Subscriber;

use App\Models\Subscriber;
use Livewire\Component;

class Index extends Component
{
    public $subscribers;
    public $show = false;
    public $email;

    public function mount()
    {
        $this->subscribers = Subscriber::orderBy('id', 'DESC')->get();
    }

    public function showAddForm()
    {
        $this->show = true;
    }

    public function closeAddForm()
    {
        $this->show = false;
    }

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create([
            'email' => $this->email
        ]);

        $this->show = false;
        $this->reset(['email']);
        $this->subscribers = Subscriber::orderBy('id', 'DESC')->get();
        return back()
            ->with('message', 'Email added successfully');
    }

    public function remove($id)
    {
        Subscriber::find($id)->delete();
        $this->subscribers = Subscriber::orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.subscriber.index');
    }
}
