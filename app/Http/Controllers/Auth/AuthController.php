<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    private $baseUrl;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
        $this->clientId = '3c15eda4-f16a-444a-9807-f03ac2d73ea6';
        $this->clientSecret = 'a36KxQjb6KQO89o6zgb2ld9fC9LwPZ3Tir5chWGC';
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'User-Agent' => 'insomnia/2023.5.8'
            ])->post("{$this->baseUrl}/auth", [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret
            ]);
            if ($response->successful()) {
                $data = json_decode($response->getBody()->getContents());
                $request->session()->regenerate();
                $request->session()->put([
                    'email' => Auth::user()->email,
                    'name' => Auth::user()->name,
                    'role' => Auth::user()->role,
                    'token' => $data->result->token,
                ]);
                Alert::toast('Berhasil login', 'success');
                switch (session('role')) {
                    case 'perda':
                        return redirect()->route('perda.index');
                    case 'pemkab':
                        return redirect()->route('pemkab.index');
                    case 'inspek':
                        return redirect()->route('inspek.index');
                    case 'admin':
                        return redirect()->route('admin.index');
                    default:
                        return redirect()->route('/');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal login: Token generation failed.');
            }
        } else {
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
