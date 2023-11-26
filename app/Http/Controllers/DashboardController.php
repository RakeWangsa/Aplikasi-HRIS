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

        return view('dashboard.karyawan', [
            'title' => 'Dashboard',
            'active' => 'dash_karyawan',
            'pengumuman' => $pengumuman,
        ]);
    }

    public function dash_executive()
    {
        return view('dashboard.executive', [
            'title' => 'Dashboard',
            'active' => 'dash_executive',
        ]);
    }

    public function dash_admin()
    {
        return view('dashboard.admin', [
            'title' => 'Dashboard',
            'active' => 'dash_admin',
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
