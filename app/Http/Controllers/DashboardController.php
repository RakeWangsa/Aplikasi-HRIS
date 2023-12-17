<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dash_karyawan()
    {
        $pengumuman = DB::table('pengumuman')
        ->select('*')
        ->get();
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('l, d F');
        $jam = date('H');
        if ($jam < 11) {
            $greetings = "Good Morning";
        } elseif ($jam < 17) {
            $greetings = "Good Afternoon";
        } else {
            $greetings = "Good Evening";
        }


        return view('dashboard.karyawan', [
            'title' => 'Dashboard',
            'active' => 'dash_karyawan',
            'pengumuman' => $pengumuman,
            'tanggal' => $tanggal,
            'greetings' => $greetings
        ]);
    }

    public function dash_executive()
    {
        $karyawan = DB::table('Users')
        ->where('level', 'karyawan')
        ->select('name')
        ->get();

        $jumlahKaryawan=count($karyawan);

        return view('dashboard.executive', [
            'title' => 'Dashboard',
            'active' => 'dash_executive',
            'jumlahKaryawan' => $jumlahKaryawan,

        ]);
    }

    public function dash_admin()
    {
        $karyawan = DB::table('Users')
        ->where('level', 'karyawan')
        ->select('name')
        ->get();
        $admin = DB::table('Users')
        ->where('level', 'admin')
        ->select('name')
        ->get();
        $executive = DB::table('Users')
        ->where('level', 'executive')
        ->select('name')
        ->get();
        $jumlahKaryawan=count($karyawan);
        $jumlahAdmin=count($admin);
        $jumlahExecutive=count($executive);
        return view('dashboard.admin', [
            'title' => 'Dashboard',
            'active' => 'dash_admin',
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahExecutive' => $jumlahExecutive
        ]);
    }

    public function submitPengumuman(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $pengumuman = $request->pengumuman;
        $waktu = date('d-m-Y H:i');
        Pengumuman::create([
            'waktu' => $waktu,
            'pesan' => $pengumuman,
        ]);

        $email = session('email');
        $level = DB::table('Users')
        ->where('email', $email)
        ->pluck('level')
        ->first();

        if($level=="executive"){
            return redirect('executive/dashboard');  
        }else{
            return redirect('admin/dashboard'); 
        }

    }
}
