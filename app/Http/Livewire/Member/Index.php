<?php

namespace App\Http\Livewire\Member;

use Livewire\WithFileUploads;
use App\Models\Member;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{

    use WithFileUploads;

    public $members;

    public function mount()
    {
        $this->members = Member::orderBy('name', 'ASC')->get();
    }


    public function remove($id)
    {
        $member = Member::findorfail($id);
        $member->delete();
        unlink('storage/' . $member->avatar_path);

        $this->members = Member::orderBy('name', 'ASC')->get();
        session()->flash('message', 'Member removed successfully');
    }

    public function render()
    {
        return view('livewire.member.index');
    }
}
