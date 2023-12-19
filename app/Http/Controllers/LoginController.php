<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariIni = date('Y-m-d');
        $waktu = date('H:i:s');
    
        // cek hari apakah sekarang hari senin-jumat
        $dayOfWeek = date('N');
        if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
            // cek apakah db sudah ada data hari ini
            $jumlahData = DB::table('absensi')->whereDate('date', $hariIni)->count();
    
            // jika belum ada isinya
            if ($jumlahData == 0) {
                // ambil data karyawan
                $karyawan = DB::table('users')
                    ->where('level', 'karyawan')
                    ->select('id')
                    ->get();
    
                // set absen tidak hadir untuk semua karyawan
                foreach ($karyawan as $data) {
                    Absensi::create([
                        'id_user' => $data->id,
                        'absensi' => 'Datang',
                        'date' => $hariIni,
                        'time' => $waktu,
                        'keterangan' => 'Tidak Hadir',
                        'file' => '-',
                    ]);
                }
            }
        }
    
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }
    

    // public function tes()
    // {
    //     return view('tes', [
    //     ]);
    // }

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
