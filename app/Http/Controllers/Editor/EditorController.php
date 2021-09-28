<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Blog;

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
                ->with('message', 'Incorrect password, Please try again.')
                ->withInput(['email' => request()->email]);
        }
    }


    public function dashboard()
    {
        $blogs = Blog::withCount('comments')
            ->where('editor_id', auth()->guard('editor')->user()->id)
            ->select('id', 'created_at', 'views')
            ->get();
        if (auth()->guard('editor')->user()->profile) {
            return view('editor.dashboard', [
                'blogs' => $blogs,
                'comments' => $blogs->sum('comments_count'),
                'views' => $blogs->sum('views'),
            ]);
        } else {
            return redirect()
                ->route('editor.profile');
        }
    }


    public function profile()
    {
        return view('editor.pages.profile.index');
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
