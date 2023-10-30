<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    
    public function indexGuest()
    {
        return view('guest.auth.login');
    }
    
    public function indexAdmin()
    {
        return view('dashboard.auth.login');
    }

    public function loginGuest(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('siswas')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/data_siswa');
        }
 
        return back()->withErrors([
            'nisn' => 'The provided credentials do not match our records.',
        ])->onlyInput('nisn');
    
    }

    public function loginAdmin(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Anda berhasil keluar!');
    }

    public function logoutGuest(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil keluar!');
    }

}
