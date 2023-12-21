<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use App\Models\BatasAbsen;

class AbsensiController extends Controller
{
    public function absensi_karyawan()
    {
        $absensi = DB::table('absensi')
        ->where('id_user', auth()->user()->id)
        ->select('*')
        ->get();
        $batas = DB::table('batas_absen')
        ->where('id',1)
        ->select('*')
        ->first();
        return view('absensi.karyawan', [
            'title' => 'Absensi',
            'active' => 'absensi_karyawan',
            'absensi' => $absensi,
            'batas' => $batas,
        ]);
    }

    public function absensi_karyawan_datang(Request $request,$status)
    {
        $batas = DB::table('batas_absen')
        ->where('id', 1)
        ->select('*')
        ->first();
        date_default_timezone_set('Asia/Jakarta');
        $cekWaktu = date('H:i:s');
        if ($cekWaktu <= $batas->batas_awal_datang || $cekWaktu >= $batas->batas_akhir_datang) {
            // Jika waktu berada di luar batas absen
            return redirect()->back()->with('error', 'Absen datang hanya dapat dilakukan pada pukul ' . $batas->batas_awal_datang . ' - ' . $batas->batas_akhir_datang);
        }

        $lokasi = $request->lokasi1;
        if($status=="Hadir"){
            if ($lokasi=="di kantor"){
                $hariIni = date('Y-m-d');
                $waktu = date('H:i:s');

                //cek sudah absen apa belum
                $cekAbsensi = DB::table('absensi')
                ->where('id_user', auth()->user()->id)
                ->where('absensi', 'Datang')
                ->whereIn('keterangan', ['Hadir', 'Izin', 'Sakit'])
                ->where('date', $hariIni)
                ->select('*')
                ->get();
                //jika belum absen
                if ($cekAbsensi->count() == 0) {
                    
                    $gambar = $request->file('gambar1'); //ambil gambar dari kolom inputan
                    $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension(); //kasih nama file gambar
                    $gambar->move(public_path('img'), $namaGambar); //file gambar di pindah ke folder "public/img"

                    $absensiToUpdate = Absensi::where('id_user', auth()->user()->id)
                    ->where('absensi', 'Datang')
                    ->where('date', $hariIni)
                    ->first();
                    
                    if ($absensiToUpdate) {
                        // Melakukan update data absensi
                        $absensiToUpdate->update([
                            'time' => $waktu,
                            'keterangan' => $status,
                            'file' => $namaGambar,
                        ]);
                    }
                }else{
                    return redirect()->back()->with('error', 'Anda sudah absen!');
                }
            } 
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $hariIni = date('Y-m-d');
            $waktu = date('H:i:s');

            //cek sudah absen apa belum
            $cekAbsensi = DB::table('absensi')
            ->where('id_user', auth()->user()->id)
            ->where('absensi', 'Datang')
            ->whereIn('keterangan', ['Hadir', 'Izin', 'Sakit'])
            ->where('date', $hariIni)
            ->select('*')
            ->get();
            //jika belum absen
            if ($cekAbsensi->count() == 0) {

                $gambar = $request->file('gambar1');
                $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move(public_path('img'), $namaGambar);

                $absensiToUpdate = Absensi::where('id_user', auth()->user()->id)
                ->where('absensi', 'Datang')
                ->where('date', $hariIni)
                ->first();
                
                if ($absensiToUpdate) {
                    // Melakukan update data absensi
                    $absensiToUpdate->update([
                        'time' => $waktu,
                        'keterangan' => $status,
                        'file' => $namaGambar,
                    ]);
                }
            }else{
                return redirect()->back()->with('error', 'Anda sudah absen!');
            }
        }
        return redirect('/employee/absensi');   
    }

    public function absensi_karyawan_pulang(Request $request,$status)
    {
        $batas = DB::table('batas_absen')
        ->where('id', 1)
        ->select('*')
        ->first();
        date_default_timezone_set('Asia/Jakarta');
        $cekWaktu = date('H:i');
        if ($cekWaktu <= $batas->batas_awal_pulang || $cekWaktu >= $batas->batas_akhir_pulang) {
            // Jika waktu berada di luar batas absen
            return redirect()->back()->with('error', 'Absen datang hanya dapat dilakukan pada pukul ' . $batas->batas_awal_pulang . ' - ' . $batas->batas_akhir_pulang);
        }

        $lokasi = $request->lokasi2;
        if($status=="Hadir"){
            if ($lokasi=="di kantor"){
                date_default_timezone_set('Asia/Jakarta');
                $hariIni = date('Y-m-d');
                $waktu = date('H:i:s');
    
                //cek sudah absen apa belum
                $cekAbsensi = DB::table('absensi')
                ->where('id_user', auth()->user()->id)
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
                        'id_user' => auth()->user()->id,
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
            date_default_timezone_set('Asia/Jakarta');
            $hariIni = date('Y-m-d');
            $waktu = date('H:i:s');

            //cek sudah absen apa belum
            $cekAbsensi = DB::table('absensi')
            ->where('id_user', auth()->user()->id)
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
                    'id_user' => auth()->user()->id,
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
        ->select('absensi.*', 'users.name')
        ->join('users', 'absensi.id_user', '=', 'users.id')
        ->get();
        $setting = DB::table('batas_absen')
        ->where('id',1)
        ->select('*')
        ->first();
        return view('absensi.admin', [
            'title' => 'Absensi',
            'active' => 'daftar_absensi',
            'absensi' => $absensi,
            'setting' => $setting,
        ]);
    }

    public function settingBatasAbsen(Request $request)
    {
        $setting = BatasAbsen::find(1);


        // Update data
        $setting->update([
            'batas_awal_datang' => $request->batas_awal_datang,
            'batas_akhir_datang' => $request->batas_akhir_datang,
            'batas_awal_pulang' => $request->batas_awal_pulang,
            'batas_akhir_pulang' => $request->batas_akhir_pulang,

        ]);
        return redirect('/daftar/absensi'); 
    }
}
