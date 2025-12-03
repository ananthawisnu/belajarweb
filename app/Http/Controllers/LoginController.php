<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke route admin.dashboard
            return redirect()->intended(route('admin.dashboard'));
            // atau simpel:
            // return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'error' => 'Password E Salah Mas',
        ])->onlyInput('email');
    }
}
