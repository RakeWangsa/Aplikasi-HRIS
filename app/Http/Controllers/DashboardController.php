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

        $kpi = DB::table('kpi_karyawan')
        ->where('id_user',auth()->user()->id)
        ->select('nilai_akhir')
        ->get();

        $totalNilaiAkhir = $kpi->sum('nilai_akhir');

        return view('dashboard.karyawan', [
            'title' => 'Dashboard',
            'active' => 'dash_karyawan',
            'pengumuman' => $pengumuman,
            'tanggal' => $tanggal,
            'greetings' => $greetings,
            'totalNilaiAkhir' => $totalNilaiAkhir,
        ]);
    }

    public function dash_executive()
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
        return view('dashboard.executive', [
            'title' => 'Dashboard',
            'active' => 'dash_executive',
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahExecutive' => $jumlahExecutive

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

        $absenHadirJanuari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 1")
        ->select('*')
        ->get();
        $absenHadirFebruari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 2")
        ->select('*')
        ->get();
        $absenHadirMaret = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 3")
        ->select('*')
        ->get();
        $absenHadirApril = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 4")
        ->select('*')
        ->get();
        $absenHadirMei = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 5")
        ->select('*')
        ->get();
        $absenHadirJuni = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 6")
        ->select('*')
        ->get();
        $absenHadirJuli = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 7")
        ->select('*')
        ->get();
        $absenHadirAgustus = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 8")
        ->select('*')
        ->get();
        $absenHadirSeptember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 9")
        ->select('*')
        ->get();
        $absenHadirOktober = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 10")
        ->select('*')
        ->get();
        $absenHadirNovember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 11")
        ->select('*')
        ->get();
        $absenHadirDesember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Hadir')
        ->whereRaw("MONTH(`date`) = 12")
        ->select('*')
        ->get();

        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirFebruari = count($absenHadirFebruari);
        $jumlahHadirMaret = count($absenHadirMaret);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);
        $jumlahHadirJanuari = count($absenHadirJanuari);

        return view('dashboard.admin', [
            'title' => 'Dashboard',
            'active' => 'dash_admin',
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahExecutive' => $jumlahExecutive,
            'jumlahHadir' => $jumlahHadir,
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
