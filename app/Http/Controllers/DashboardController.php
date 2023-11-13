<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash_karyawan()
    {
        return view('dashboard.karyawan', [
            'title' => 'Dashboard',
            'active' => 'dash_karyawan',
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
}
