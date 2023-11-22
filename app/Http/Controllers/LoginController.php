<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function tes()
    {
        return view('tes', [
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $level = DB::table('users')
            ->where('email', $email)
            ->pluck('level')
            ->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['email' => $email]);
            if ($level == 'admin') {
                return redirect('/admin/dashboard');
            } else if ($level == 'karyawan') {
                return redirect('/employee/dashboard');
            } else {
                return redirect('/executive/dashboard');
            }
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
