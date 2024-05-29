<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{
    public function loginView()
    {
        return view('auth.index');
    }

    public function loginProcess(Request $request)
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

            // Display a success message
            Alert::toast('Berhasil login', 'success');

            // Redirect based on user role
            switch (session('role')) {
                case 'perda':
                    return redirect()->route('perda.index.page');
                case 'pemkab':
                    return redirect()->route('pemkab.index.page');
                case 'inspektorat':
                    return redirect()->route('inspektorat.index.page');
                case 'admin':
                    return redirect()->route('admin.page');
                default:
                    return redirect()->route('');
            }
        } else {
            // Display an error message
            Alert::toast('Email & Kata Sandi Tidak cocok dengan database kami', 'warning');
            return redirect()->back()->with('error', 'Email & Kata Sandi Tidak cocok dengan database kami');
        }
    }

    public function logutProcess(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('view.login.page');
    }
}
