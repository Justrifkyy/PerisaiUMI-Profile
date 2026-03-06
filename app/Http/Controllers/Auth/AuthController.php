<?php

namespace App\Http\Controllers\Auth; // 1. Namespace sudah diupdate

use App\Http\Controllers\Controller; // 2. Wajib import base Controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        // 3. Path view sudah disesuaikan dengan struktur folder baru
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Berikan petunjuk ke Intelephense bahwa ini adalah Model User kita
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Check if user is admin
            if ($user->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            // Regular users are logged out
            Auth::logout();
            return back()->withErrors([
                'email' => 'You do not have admin access.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
