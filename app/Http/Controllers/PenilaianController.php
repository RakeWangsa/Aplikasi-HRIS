<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KPI_admin;
use App\Models\KPI_karyawan;

class PenilaianController extends Controller
{
    public function kpi_karyawan()
    {
        $kpi = DB::table('kpi_admin')
        ->leftJoin('kpi_karyawan', 'kpi_admin.id', '=', 'kpi_karyawan.id_kpi_admin')
        ->where('kpi_admin.divisi', auth()->user()->job)
        ->select('kpi_admin.*', 'kpi_karyawan.id_user','kpi_karyawan.realisasi','kpi_karyawan.score','kpi_karyawan.nilai_akhir','kpi_karyawan.sumber',)
        ->orderBy('kpi_admin.tanggung_jawab_pekerjaan')
        ->get();
    
    
        return view('penilaian.kpi-karyawan', [
            'title' => 'KPI',
            'active' => 'kpi_karyawan',
            'kpi' => $kpi,
        ]);
    }

    public function isi_KPI(Request $request)
    {
        $nilai_akhir=100;
        $sumber="iya"; 
        dd($request->id_kpi_admin);
        KPI_karyawan::create([
            'id_user' => auth()->user()->id,
            'id_kpi_admin' => $request->id_kpi_admin,
            'realisasi' => $request->realisasi,
            'score' => $request->score,
            'nilai_akhir' => $nilai_akhir,
            'sumber' => $sumber,
        ]);
        return redirect('/employee/kpi');
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

        return view('penilaian.kpi-admin', [
            'title' => 'KPI',
            'active' => 'kpi_admin',
            'job' => $job,

        ]);
    }

    public function kpi_admin_filter($divisi)
    {
        $job = DB::table('Users')
        ->where('level','karyawan')
        ->select('job')
        ->distinct()
        ->get();
        $kpi = DB::table('kpi_admin')
        ->where('divisi',$divisi)
        ->select('*')
        ->orderBy('tanggung_jawab_pekerjaan')
        ->get();
        return view('penilaian.kpi-admin', [
            'title' => 'KPI',
            'active' => 'kpi_admin',
            'job' => $job,
            'kpi' => $kpi,
            'divisi' => $divisi
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

    public function hapus_KPI($id)
    {
        KPI_admin::find($id)->delete();

        return redirect('/admin/kpi')->with('success', 'Data KPI berhasil dihapus');
    }

    public function update_KPI(Request $request, $id)
{
    // Temukan data berdasarkan ID
    $kpi = KPI_admin::find($id);


    // Update data
    $kpi->update([
        'tanggung_jawab_pekerjaan' => $request->update_tanggung_jawab_pekerjaan,
        'key_performance_indikator' => $request->update_key_performance_indikator,
        'bobot' => $request->update_bobot,
        'target' => $request->update_target,
    ]);

    return redirect('/admin/kpi')->with('success', 'Data KPI berhasil diperbarui');
}


    public function okr_admin()
    {
        return view('penilaian.okr-admin', [
            'title' => 'OKR',
            'active' => 'okr_admin'
        ]);
    }
}
