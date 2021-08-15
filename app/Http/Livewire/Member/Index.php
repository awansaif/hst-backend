<?php

namespace App\Http\Livewire\Member;

use Livewire\WithFileUploads;
use App\Models\Member;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{

    use WithFileUploads;

    public $showAddForm = false;
    public $showEditForm = false;
    public $members;
    public $name;
    public $memberId;
    public $avatar_path;
    public $avatar;

    public function mount()
    {
        $this->members = Member::orderBy('name', 'ASC')->get();
    }


    public function showAddForm()
    {
        $this->showAddForm = true;
    }


    public function closeForm()
    {
        $this->showAddForm = false;
        $this->showEditForm = false;
        $this->reset(['name', 'avatar_path', 'avatar']);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'avatar_path' => 'image',
        ]);

        Member::create([
            'name' => $this->name,
            'avatar_path' => $this->avatar_path->store('images', 'public'),
        ]);

        $this->reset(['name', 'avatar_path']);

        $this->members = Member::orderBy('name', 'ASC')->get();
        $this->showAddForm = false;
        session()->flash('message', 'Member added successfully');
    }


    public function showEditForm($id)
    {
        $this->reset(['id', 'name', 'avatar_path', 'avatar', 'memberId']);
        $member =  Member::find($id);
        $this->name = $member->name;
        $this->memberId = $member->id;
        $this->showEditForm = true;
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $member = Member::find($this->memberId);

        $member->update([
            'name' => $this->name,
            'avatar_path' => $this->avatar ?  $this->avatar->store('images', 'public') : $member->avatar_path
        ]);

        $this->reset(['name', 'avatar']);

        $this->members = Member::orderBy('name', 'ASC')->get();
        $this->showEditForm = false;
        session()->flash('message', 'Member updated successfully');
    }

    public function remove($id)
    {
        Member::find($id)->delete();


        $this->members = Member::orderBy('name', 'ASC')->get();
        session()->flash('message', 'Member removed successfully');
    }

    public function render()
    {
        return view('livewire.member.index');
    }
}
