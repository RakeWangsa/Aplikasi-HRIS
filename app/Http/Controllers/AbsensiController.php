<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function absensi_karyawan()
    {
        $absensi = DB::table('absensi')
        ->where('id_user', auth()->user()->id)
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
                    
                    $gambar = $request->file('gambar1'); //ambil gambar dari kolom inputan
                    $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension(); //kasih nama file gambar
                    $gambar->move(public_path('img'), $namaGambar); //file gambar di pindah ke folder "public/img"

                    Absensi::create([
                        'id' => auth()->user()->id,
                        'absensi' => 'Datang',
                        'date' => $hariIni,
                        'time' => $waktu,
                        'keterangan' => $status,
                        'file' => $namaGambar,
                    ]);
                }else{
                    return redirect()->back()->with('error', 'Anda sudah absen!');
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

                $gambar = $request->file('gambar1');
                $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('img'), $namaGambar);

                Absensi::create([
                    'id' => auth()->user()->id,
                    'absensi' => 'Datang',
                    'date' => $hariIni,
                    'time' => $waktu,
                    'keterangan' => $status,
                    'file' => $namaGambar,
                ]);
            }else{
                return redirect()->back()->with('error', 'Anda sudah absen!');
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

                    $gambar = $request->file('gambar2');
                    $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension();
                    $gambar->move(public_path('img'), $namaGambar);

                    Absensi::create([
                        'id' => auth()->user()->id,
                        'absensi' => 'Pulang',
                        'date' => $hariIni,
                        'time' => $waktu,
                        'keterangan' => $status,
                        'file' => $namaGambar,
                    ]);
                }else{
                    return redirect()->back()->with('error', 'Anda sudah absen!');
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

                $gambar = $request->file('gambar2');
                $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('img'), $namaGambar);

                Absensi::create([
                    'id' => auth()->user()->id,
                    'absensi' => 'Pulang',
                    'date' => $hariIni,
                    'time' => $waktu,
                    'keterangan' => $status,
                    'file' => $namaGambar,
                ]);
            }else{
                return redirect()->back()->with('error', 'Anda sudah absen!');
            }
        }
        return redirect('/employee/absensi');   
    }

    public function daftar_absensi()
    {
        $absensi = DB::table('absensi')
        ->select('*')
        ->get();
        return view('absensi.admin', [
            'title' => 'Absensi',
            'active' => 'daftar_absensi',
            'absensi' => $absensi,
        ]);
    }
}
