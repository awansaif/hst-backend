<?php

namespace App\Http\Livewire\Editor\Profile;

use App\Models\Editor;
use App\Models\EditorProfile;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{

    use WithFileUploads;
    public $avatar, $profile, $name, $website_link, $about_me;

    public function mount()
    {
        $editor = EditorProfile::query()
            ->where('editor_id', auth()->guard('editor')->user()->id)
            ->first();
        $this->avatar = $editor->avatar_path;
        $this->name = auth()->guard('editor')->user()->name;
        $this->website_link = $editor->website_link;
        $this->about_me = $editor->about_me;
    }

    public function updateProfile()
    {
        $this->validate([
            'profile' => 'nullable|image',
            'name' => 'required',
            'website_link' => 'required|url',
            'about_me' => 'required|max:255'
        ]);
        $editor = Editor::findorfail(auth()->guard('editor')->user()->id);

        $editor->update([
            'name' => $this->name
        ]);
        $editorProfile = EditorProfile::updateorCreate([
            'editor_id' => auth()->guard('editor')->user()->id
        ], [
            'website_link' => $this->website_link,
            'about_me'  => $this->about_me
        ]);

        if ($this->profile) {
            unlink('storage/' . $editorProfile->avatar_path);
            $editorProfile->update([
                'avatar_path'  => $this->profile->store('profiles', 'public'),
            ]);
        }
        return back()
            ->with('message', 'Profile Updated successfully');
    }

    public function render()
    {
        return view('livewire.editor.profile.update');
    }
}
