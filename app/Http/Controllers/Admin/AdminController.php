<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // show login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()
                ->route('admin.dashboard');
        } else {
            return back()
                ->with('message', 'Incorrect Password')
                ->withInput(['email' => $request->email]);
        }
    }


    // dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.showLoginForm');
    }
}
