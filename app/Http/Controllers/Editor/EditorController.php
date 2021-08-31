<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Models\EditorProfile;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function showLoginForm()
    {
        return view('editor.auth.login');
    }


    public function login()
    {
        request()->validate([
            'email' => 'required|exists:editors,email',
            'password' => 'required'
        ]);


        if (auth()->guard('editor')->attempt(['email' => request()->email, 'password' => request()->password])) {
            return redirect()->route('editor.dashboard');
        } else {
            return back()
                ->with('message', 'Incorrect Password')
                ->withInput(['email' => request()->email]);
        }
    }


    public function dashboard()
    {
        if (auth()->guard('editor')->user()->profile) {
            return view('editor.dashboard');
        } else {
            return redirect()
                ->route('editor.profile');
        }
    }


    public function profile()
    {
        return view('editor.pages.profile.index');
    }

    public function updateProfile()
    {
        request()->validate([
            'profile' => 'nullable|image',
            'name' => 'required',
            'website_link' => 'required|url',
            'about_me' => 'required|max:255'
        ]);
        $editor = Editor::findorfail(auth()->guard('editor')->user()->id);

        $editor->update([
            'name' => request()->name
        ]);
        EditorProfile::updateorCreate([
            'editor_id' => auth()->guard('editor')->user()->id
        ], [
            'editor_id' => auth()->guard('editor')->user()->id,
            'avatar_path'  => auth()->guard('editor')->user()->profile && request()->profile ? request()->profile->store('profiles', 'public') : '',
            'website_link' => request()->website_link,
            'about_me'  => request()->about_me
        ]);

        return back()
            ->with('message', 'Profile Updated successfully');
    }

    public function setting()
    {
        return view('editor.pages.setting.index');
    }
    public function logout()
    {
        auth()->guard('editor')->logout();
        return redirect()
            ->route('editor.showLoginForm');
    }
}
