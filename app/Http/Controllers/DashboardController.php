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
        $jumlahHadirApril = count($absenHadirApril);
        $jumlahHadirMei = count($absenHadirMei);
        $jumlahHadirJuni = count($absenHadirJuni);
        $jumlahHadirJuli = count($absenHadirJuli);
        $jumlahHadirAgustus = count($absenHadirAgustus);
        $jumlahHadirSeptember = count($absenHadirSeptember);
        $jumlahHadirOktober = count($absenHadirOktober);
        $jumlahHadirNovember = count($absenHadirNovember);
        $jumlahHadirDesember = count($absenHadirDesember);

        $absenSakitJanuari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 1")
        ->select('*')
        ->get();
        $absenSakitFebruari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 2")
        ->select('*')
        ->get();
        $absenSakitMaret = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 3")
        ->select('*')
        ->get();
        $absenSakitApril = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 4")
        ->select('*')
        ->get();
        $absenSakitMei = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 5")
        ->select('*')
        ->get();
        $absenSakitJuni = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 6")
        ->select('*')
        ->get();
        $absenSakitJuli = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 7")
        ->select('*')
        ->get();
        $absenSakitAgustus = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 8")
        ->select('*')
        ->get();
        $absenSakitSeptember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 9")
        ->select('*')
        ->get();
        $absenSakitOktober = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 10")
        ->select('*')
        ->get();
        $absenSakitNovember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 11")
        ->select('*')
        ->get();
        $absenSakitDesember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 12")
        ->select('*')
        ->get();

        $jumlahSakitJanuari = count($absenSakitJanuari);
        $jumlahSakitFebruari = count($absenSakitFebruari);
        $jumlahSakitMaret = count($absenSakitMaret);
        $jumlahSakitApril = count($absenSakitApril);
        $jumlahSakitMei = count($absenSakitMei);
        $jumlahSakitJuni = count($absenSakitJuni);
        $jumlahSakitJuli = count($absenSakitJuli);
        $jumlahSakitAgustus = count($absenSakitAgustus);
        $jumlahSakitSeptember = count($absenSakitSeptember);
        $jumlahSakitOktober = count($absenSakitOktober);
        $jumlahSakitNovember = count($absenSakitNovember);
        $jumlahSakitDesember = count($absenSakitDesember);

        $absenIzinJanuari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 1")
        ->select('*')
        ->get();
        $absenIzinFebruari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 2")
        ->select('*')
        ->get();
        $absenIzinMaret = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 3")
        ->select('*')
        ->get();
        $absenIzinApril = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 4")
        ->select('*')
        ->get();
        $absenIzinMei = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 5")
        ->select('*')
        ->get();
        $absenIzinJuni = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 6")
        ->select('*')
        ->get();
        $absenIzinJuli = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 7")
        ->select('*')
        ->get();
        $absenIzinAgustus = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 8")
        ->select('*')
        ->get();
        $absenIzinSeptember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 9")
        ->select('*')
        ->get();
        $absenIzinOktober = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 10")
        ->select('*')
        ->get();
        $absenIzinNovember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 11")
        ->select('*')
        ->get();
        $absenIzinDesember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 12")
        ->select('*')
        ->get();

        $jumlahIzinJanuari = count($absenIzinJanuari);
        $jumlahIzinFebruari = count($absenIzinFebruari);
        $jumlahIzinMaret = count($absenIzinMaret);
        $jumlahIzinApril = count($absenIzinApril);
        $jumlahIzinMei = count($absenIzinMei);
        $jumlahIzinJuni = count($absenIzinJuni);
        $jumlahIzinJuli = count($absenIzinJuli);
        $jumlahIzinAgustus = count($absenIzinAgustus);
        $jumlahIzinSeptember = count($absenIzinSeptember);
        $jumlahIzinOktober = count($absenIzinOktober);
        $jumlahIzinNovember = count($absenIzinNovember);
        $jumlahIzinDesember = count($absenIzinDesember);

        $currentMonth = date('n');  // n: nomor bulan tanpa leading zeros (1-12)
        $currentYear = date('Y');   // Y: tahun empat digit
        $currentDay = date('j');    // j: hari dalam sebulan tanpa leading zeros (1-31)
        
        // Tanggal yang diinginkan (tanggal hari ini)
        $desiredDay = $currentDay;
        
        // Mendapatkan jumlah hari kerja (Senin-Jumat) dari tanggal 1 hingga tanggal tertentu
        $jumlahHariKerja = 0;
        
        
        if ($currentMonth == 1) {
            for ($day = 1; $day <= $desiredDay; $day++) {
                $currentDate = date('Y-m-d', strtotime("$currentYear-01-$day"));
                $dayOfWeek = date('N', strtotime($currentDate)); // N: nomor hari dalam seminggu (1: Senin, 2: Selasa, dst.)
        
                // Cek apakah hari ini adalah hari kerja (Senin-Jumat)
                if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
                    $jumlahHariKerja++;
                }
            }
        } else {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

            // Hitung dari tanggal 1 hingga tanggal maksimum pada bulan tersebut
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentDate = date('Y-m-d', strtotime("$currentYear-$currentMonth-$day"));
                $dayOfWeek = date('N', strtotime($currentDate));
            
                // Cek apakah hari ini adalah hari kerja (Senin-Jumat)
                if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
                    $jumlahHariKerja++;
                }
            }
        }
        $jumlahTidakHadirJanuari=$jumlahKaryawan*$jumlahHariKerja-$jumlahHadirJanuari-$jumlahSakitJanuari-$jumlahIzinJanuari;


        return view('dashboard.executive', [
            'title' => 'Dashboard',
            'active' => 'dash_executive',
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahExecutive' => $jumlahExecutive,

            'jumlahHadirJanuari' => $jumlahHadirJanuari,
            'jumlahHadirFebruari' => $jumlahHadirFebruari,
            'jumlahHadirMaret' => $jumlahHadirMaret,
            'jumlahHadirApril' => $jumlahHadirApril,
            'jumlahHadirMei' => $jumlahHadirMei,
            'jumlahHadirJuni' => $jumlahHadirJuni,
            'jumlahHadirJuli' => $jumlahHadirJuli,
            'jumlahHadirAgustus' => $jumlahHadirAgustus,
            'jumlahHadirSeptember' => $jumlahHadirSeptember,
            'jumlahHadirOktober' => $jumlahHadirOktober,
            'jumlahHadirNovember' => $jumlahHadirNovember,
            'jumlahHadirDesember' => $jumlahHadirDesember,

            'jumlahSakitJanuari' => $jumlahSakitJanuari,
            'jumlahSakitFebruari' => $jumlahSakitFebruari,
            'jumlahSakitMaret' => $jumlahSakitMaret,
            'jumlahSakitApril' => $jumlahSakitApril,
            'jumlahSakitMei' => $jumlahSakitMei,
            'jumlahSakitJuni' => $jumlahSakitJuni,
            'jumlahSakitJuli' => $jumlahSakitJuli,
            'jumlahSakitAgustus' => $jumlahSakitAgustus,
            'jumlahSakitSeptember' => $jumlahSakitSeptember,
            'jumlahSakitOktober' => $jumlahSakitOktober,
            'jumlahSakitNovember' => $jumlahSakitNovember,
            'jumlahSakitDesember' => $jumlahSakitDesember,

            'jumlahIzinJanuari' => $jumlahIzinJanuari,
            'jumlahIzinFebruari' => $jumlahIzinFebruari,
            'jumlahIzinMaret' => $jumlahIzinMaret,
            'jumlahIzinApril' => $jumlahIzinApril,
            'jumlahIzinMei' => $jumlahIzinMei,
            'jumlahIzinJuni' => $jumlahIzinJuni,
            'jumlahIzinJuli' => $jumlahIzinJuli,
            'jumlahIzinAgustus' => $jumlahIzinAgustus,
            'jumlahIzinSeptember' => $jumlahIzinSeptember,
            'jumlahIzinOktober' => $jumlahIzinOktober,
            'jumlahIzinNovember' => $jumlahIzinNovember,
            'jumlahIzinDesember' => $jumlahIzinDesember,

            'jumlahTidakHadirJanuari' => $jumlahTidakHadirJanuari,
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
        $jumlahHadirApril = count($absenHadirApril);
        $jumlahHadirMei = count($absenHadirMei);
        $jumlahHadirJuni = count($absenHadirJuni);
        $jumlahHadirJuli = count($absenHadirJuli);
        $jumlahHadirAgustus = count($absenHadirAgustus);
        $jumlahHadirSeptember = count($absenHadirSeptember);
        $jumlahHadirOktober = count($absenHadirOktober);
        $jumlahHadirNovember = count($absenHadirNovember);
        $jumlahHadirDesember = count($absenHadirDesember);

        $absenSakitJanuari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 1")
        ->select('*')
        ->get();
        $absenSakitFebruari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 2")
        ->select('*')
        ->get();
        $absenSakitMaret = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 3")
        ->select('*')
        ->get();
        $absenSakitApril = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 4")
        ->select('*')
        ->get();
        $absenSakitMei = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 5")
        ->select('*')
        ->get();
        $absenSakitJuni = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 6")
        ->select('*')
        ->get();
        $absenSakitJuli = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 7")
        ->select('*')
        ->get();
        $absenSakitAgustus = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 8")
        ->select('*')
        ->get();
        $absenSakitSeptember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 9")
        ->select('*')
        ->get();
        $absenSakitOktober = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 10")
        ->select('*')
        ->get();
        $absenSakitNovember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 11")
        ->select('*')
        ->get();
        $absenSakitDesember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Sakit')
        ->whereRaw("MONTH(`date`) = 12")
        ->select('*')
        ->get();

        $jumlahSakitJanuari = count($absenSakitJanuari);
        $jumlahSakitFebruari = count($absenSakitFebruari);
        $jumlahSakitMaret = count($absenSakitMaret);
        $jumlahSakitApril = count($absenSakitApril);
        $jumlahSakitMei = count($absenSakitMei);
        $jumlahSakitJuni = count($absenSakitJuni);
        $jumlahSakitJuli = count($absenSakitJuli);
        $jumlahSakitAgustus = count($absenSakitAgustus);
        $jumlahSakitSeptember = count($absenSakitSeptember);
        $jumlahSakitOktober = count($absenSakitOktober);
        $jumlahSakitNovember = count($absenSakitNovember);
        $jumlahSakitDesember = count($absenSakitDesember);

        $absenIzinJanuari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 1")
        ->select('*')
        ->get();
        $absenIzinFebruari = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 2")
        ->select('*')
        ->get();
        $absenIzinMaret = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 3")
        ->select('*')
        ->get();
        $absenIzinApril = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 4")
        ->select('*')
        ->get();
        $absenIzinMei = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 5")
        ->select('*')
        ->get();
        $absenIzinJuni = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 6")
        ->select('*')
        ->get();
        $absenIzinJuli = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 7")
        ->select('*')
        ->get();
        $absenIzinAgustus = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 8")
        ->select('*')
        ->get();
        $absenIzinSeptember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 9")
        ->select('*')
        ->get();
        $absenIzinOktober = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 10")
        ->select('*')
        ->get();
        $absenIzinNovember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 11")
        ->select('*')
        ->get();
        $absenIzinDesember = DB::table('absensi')
        ->where('absensi', 'datang')
        ->where('keterangan', 'Izin')
        ->whereRaw("MONTH(`date`) = 12")
        ->select('*')
        ->get();

        $jumlahIzinJanuari = count($absenIzinJanuari);
        $jumlahIzinFebruari = count($absenIzinFebruari);
        $jumlahIzinMaret = count($absenIzinMaret);
        $jumlahIzinApril = count($absenIzinApril);
        $jumlahIzinMei = count($absenIzinMei);
        $jumlahIzinJuni = count($absenIzinJuni);
        $jumlahIzinJuli = count($absenIzinJuli);
        $jumlahIzinAgustus = count($absenIzinAgustus);
        $jumlahIzinSeptember = count($absenIzinSeptember);
        $jumlahIzinOktober = count($absenIzinOktober);
        $jumlahIzinNovember = count($absenIzinNovember);
        $jumlahIzinDesember = count($absenIzinDesember);


        return view('dashboard.admin', [
            'title' => 'Dashboard',
            'active' => 'dash_admin',
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahExecutive' => $jumlahExecutive,

            'jumlahHadirJanuari' => $jumlahHadirJanuari,
            'jumlahHadirFebruari' => $jumlahHadirFebruari,
            'jumlahHadirMaret' => $jumlahHadirMaret,
            'jumlahHadirApril' => $jumlahHadirApril,
            'jumlahHadirMei' => $jumlahHadirMei,
            'jumlahHadirJuni' => $jumlahHadirJuni,
            'jumlahHadirJuli' => $jumlahHadirJuli,
            'jumlahHadirAgustus' => $jumlahHadirAgustus,
            'jumlahHadirSeptember' => $jumlahHadirSeptember,
            'jumlahHadirOktober' => $jumlahHadirOktober,
            'jumlahHadirNovember' => $jumlahHadirNovember,
            'jumlahHadirDesember' => $jumlahHadirDesember,

            'jumlahSakitJanuari' => $jumlahSakitJanuari,
            'jumlahSakitFebruari' => $jumlahSakitFebruari,
            'jumlahSakitMaret' => $jumlahSakitMaret,
            'jumlahSakitApril' => $jumlahSakitApril,
            'jumlahSakitMei' => $jumlahSakitMei,
            'jumlahSakitJuni' => $jumlahSakitJuni,
            'jumlahSakitJuli' => $jumlahSakitJuli,
            'jumlahSakitAgustus' => $jumlahSakitAgustus,
            'jumlahSakitSeptember' => $jumlahSakitSeptember,
            'jumlahSakitOktober' => $jumlahSakitOktober,
            'jumlahSakitNovember' => $jumlahSakitNovember,
            'jumlahSakitDesember' => $jumlahSakitDesember,

            'jumlahIzinJanuari' => $jumlahIzinJanuari,
            'jumlahIzinFebruari' => $jumlahIzinFebruari,
            'jumlahIzinMaret' => $jumlahIzinMaret,
            'jumlahIzinApril' => $jumlahIzinApril,
            'jumlahIzinMei' => $jumlahIzinMei,
            'jumlahIzinJuni' => $jumlahIzinJuni,
            'jumlahIzinJuli' => $jumlahIzinJuli,
            'jumlahIzinAgustus' => $jumlahIzinAgustus,
            'jumlahIzinSeptember' => $jumlahIzinSeptember,
            'jumlahIzinOktober' => $jumlahIzinOktober,
            'jumlahIzinNovember' => $jumlahIzinNovember,
            'jumlahIzinDesember' => $jumlahIzinDesember,
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
