<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            // Store user information in the session
            $request->session()->put([
                'email' => Auth::user()->email,
                'name' => Auth::user()->name,
                'role' => Auth::user()->role,
            ]);

            // Redirect based on user role
            switch (session('role')) {
                case 'perda':
                    return redirect()->route('perda.index.page');
                case 'pemkab':
                    return redirect()->route('pemkab.index.page');
                case 'inspek':
                    return redirect()->route('inspektorat.index.page');
                case 'admin':
                    return redirect()->route('admin.page');
                default:
                    return redirect()->route('');
            }
        } else {
            // Display an error message
            // Alert::toast('Email & Kata Sandi Tidak cocok dengan database kami', 'warning');
            return redirect()->back()->with('error', 'Email & Kata Sandi Tidak cocok dengan database kami');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.index');
    }
}
