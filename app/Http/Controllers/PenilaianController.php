<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KPI_admin;

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
        $job = DB::table('Users')
        ->where('level','karyawan')
        ->select('job')
        ->distinct()
        ->get();
        $kpi = DB::table('kpi_admin')
        ->select('*')
        ->get();
        return view('penilaian.kpi-admin', [
            'title' => 'KPI',
            'active' => 'kpi_admin',
            'job' => $job,
            'kpi' => $kpi
        ]);
    }

    public function add_KPI(Request $request)
    {
        KPI_admin::create([
            'divisi' => $request->divisi,
            'tanggung_jawab_pekerjaan' => $request->tanggung_jawab_pekerjaan,
            'key_performance_indikator' => $request->key_performance_indikator,
            'bobot' => $request->bobot,
            'target' => $request->target,
        ]);
        return redirect('/admin/kpi');
    }

    public function okr_admin()
    {
        return view('penilaian.okr-admin', [
            'title' => 'OKR',
            'active' => 'okr_admin'
        ]);
    }
}
