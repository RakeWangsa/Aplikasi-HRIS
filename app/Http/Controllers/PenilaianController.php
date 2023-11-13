<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function kpi_karyawan()
    {
        return view('penilaian.kpi-karyawan', [
            'title' => 'KPI',
            'active' => 'kpi_karyawan',
        ]);
    }

    public function okr_karyawan()
    {
        return view('penilaian.okr-karyawan', [
            'title' => 'OKR',
            'active' => 'okr_karyawan'
        ]);
    }

    public function kpi_admin()
    {
        return view('penilaian.kpi-admin', [
            'title' => 'KPI',
            'active' => 'kpi_admin',
        ]);
    }

    public function okr_admin()
    {
        return view('penilaian.okr-admin', [
            'title' => 'OKR',
            'active' => 'okr_admin'
        ]);
    }
}
