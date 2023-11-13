<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absensi_karyawan()
    {
        return view('absensi.karyawan', [
            'title' => 'Absensi',
            'active' => 'absensi_karyawan',
        ]);
    }

    public function daftar_absensi()
    {
        return view('absensi.admin', [
            'title' => 'Absensi',
            'active' => 'daftar_absensi',
        ]);
    }
}
