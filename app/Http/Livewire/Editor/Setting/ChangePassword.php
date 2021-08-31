<?php

namespace App\Http\Livewire\Editor\Setting;

use App\Models\Editor;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePassword extends Component
{
    public $old_password;
    public $new_password;


    public function changePasword()
    {
        $this->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8'
        ]);

        if ($this->old_password == $this->new_password) {
            throw ValidationException::withMessages(['new_password' => 'new password not same as old password']);
        }

        if (!Hash::check($this->old_password, auth()->guard('editor')->user()->password)) {
            throw ValidationException::withMessages(['old_password' => 'Old password not matched']);
        } else {
            $editor = Editor::findorfail(auth()->guard('editor')->user()->id);
            auth()->guard('editor')->user()->update([
                'password' => Hash::make($this->new_password)
            ]);

            session()->flash('message', 'Password Updated successfully');
        }
        $this->reset();
    }
    public function render()
    {
        return view('livewire.editor.setting.change-password');
    }
}
