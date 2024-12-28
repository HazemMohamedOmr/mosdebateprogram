<?php

namespace App\Http\Service\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminLoginService
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login($request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
