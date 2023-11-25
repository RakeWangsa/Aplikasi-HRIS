<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function absensi_karyawan()
    {
        $email = session('email');
        $absensi = DB::table('absensi')
        ->where('email', $email)
        ->select('*')
        ->get();
        return view('absensi.karyawan', [
            'title' => 'Absensi',
            'active' => 'absensi_karyawan',
            'absensi' => $absensi,
        ]);
    }

    public function absensi_karyawan_datang(Request $request,$status)
    {
        $lokasi = $request->lokasi1;
        if($status=="Hadir"){
            if ($lokasi=="di kantor"){
                $email = session('email');
                $name = DB::table('Users')
                ->where('email', $email)
                ->pluck('name')
                ->first();
                date_default_timezone_set('Asia/Jakarta');
                $hariIni = date('Y-m-d');
                $waktu = date('H:i:s');
    
                //cek sudah absen apa belum
                $cekAbsensi = DB::table('absensi')
                ->where('email', $email)
                ->where('absensi', 'Datang')
                ->where('date', $hariIni)
                ->select('*')
                ->get();
                //jika belum absen
                if ($cekAbsensi->count() == 0) {
                    Absensi::create([
                        'nama' => $name,
                        'email' => $email,
                        'absensi' => 'Datang',
                        'date' => $hariIni,
                        'time' => $waktu,
                        'keterangan' => $status,
                        'file' => 'tes',
                    ]);
                }
            } 
        }else{
            $email = session('email');
            $name = DB::table('Users')
            ->where('email', $email)
            ->pluck('name')
            ->first();
            date_default_timezone_set('Asia/Jakarta');
            $hariIni = date('Y-m-d');
            $waktu = date('H:i:s');

            //cek sudah absen apa belum
            $cekAbsensi = DB::table('absensi')
            ->where('email', $email)
            ->where('absensi', 'Datang')
            ->where('date', $hariIni)
            ->select('*')
            ->get();
            //jika belum absen
            if ($cekAbsensi->count() == 0) {
                Absensi::create([
                    'nama' => $name,
                    'email' => $email,
                    'absensi' => 'Datang',
                    'date' => $hariIni,
                    'time' => $waktu,
                    'keterangan' => $status,
                    'file' => 'tes',
                ]);
            }
        }
        return redirect('/employee/absensi');   
    }

    public function absensi_karyawan_pulang(Request $request,$status)
    {
        $lokasi = $request->lokasi2;
        if($status=="Hadir"){
            if ($lokasi=="di kantor"){
                $email = session('email');
                $name = DB::table('Users')
                ->where('email', $email)
                ->pluck('name')
                ->first();
                date_default_timezone_set('Asia/Jakarta');
                $hariIni = date('Y-m-d');
                $waktu = date('H:i:s');
    
                //cek sudah absen apa belum
                $cekAbsensi = DB::table('absensi')
                ->where('email', $email)
                ->where('absensi', 'Pulang')
                ->where('date', $hariIni)
                ->select('*')
                ->get();
                //jika belum absen
                if ($cekAbsensi->count() == 0) {
                    Absensi::create([
                        'nama' => $name,
                        'email' => $email,
                        'absensi' => 'Pulang',
                        'date' => $hariIni,
                        'time' => $waktu,
                        'keterangan' => $status,
                        'file' => 'tes',
                    ]);
                }
            }
        }else{
            $email = session('email');
            $name = DB::table('Users')
            ->where('email', $email)
            ->pluck('name')
            ->first();
            date_default_timezone_set('Asia/Jakarta');
            $hariIni = date('Y-m-d');
            $waktu = date('H:i:s');

            //cek sudah absen apa belum
            $cekAbsensi = DB::table('absensi')
            ->where('email', $email)
            ->where('absensi', 'Pulang')
            ->where('date', $hariIni)
            ->select('*')
            ->get();
            //jika belum absen
            if ($cekAbsensi->count() == 0) {
                Absensi::create([
                    'nama' => $name,
                    'email' => $email,
                    'absensi' => 'Pulang',
                    'date' => $hariIni,
                    'time' => $waktu,
                    'keterangan' => $status,
                    'file' => 'tes',
                ]);
            }
        }
        return redirect('/employee/absensi');   
    }

    public function daftar_absensi()
    {
        return view('absensi.admin', [
            'title' => 'Absensi',
            'active' => 'daftar_absensi',
        ]);
    }
}
