<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        if (Auth::check()) {
            return redirect()->route('items.index');
        }

        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->role !== 'admin') {

            Auth::logout();

            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'email' => 'This account does not have administrator access.',
                ])
                ->onlyInput('email');
        }

        return redirect()
            ->intended(route('items.index'))
            ->with('success', 'Welcome, Administrator!');
    }

    public function showStaffLogin()
    {
        if (Auth::check()) {
            return redirect()->route('items.index');
        }

        return view('auth.staff-login');
    }

    public function staffLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->role !== 'staff') {

            Auth::logout();

            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'email' => 'This account does not have staff access.',
                ])
                ->onlyInput('email');
        }

        return redirect()
            ->intended(route('items.index'))
            ->with('success', 'Welcome, Staff!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}