<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile_karyawan()
    {
        return view('profiles.karyawan ', [
            'title' => 'My Profile',
            'active' => 'profile_karyawan',
        ]);
    }

    public function profile_executive()
    {
        return view('profiles.executive', [
            'title' => 'Daftar Karyawan',
            'active' => 'profile_executive',
        ]);
    }

    public function profile_admin()
    {
        return view('profiles.admin', [
            'title' => 'Profiles',
            'active' => 'profile_admin',
        ]);
    }
}
