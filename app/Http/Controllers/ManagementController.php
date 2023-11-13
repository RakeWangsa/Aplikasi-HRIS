<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    public function index()
    {
        $karyawan = DB::table('Users')
            ->where('level', 'karyawan')
            ->select('id', 'name', 'email')
            ->get();
        $executive = DB::table('Users')
            ->where('level', 'executive')
            ->select('id', 'name', 'email')
            ->get();
        $admin = DB::table('Users')
            ->where('level', 'admin')
            ->select('id', 'name', 'email')
            ->get();

        return view('managementUser.index', [
            'title' => 'Management User',
            'active' => 'manage_user',
            'karyawan' => $karyawan,
            'executive' => $executive,
            'admin' => $admin
        ]);
    }

    public function tambah(Request $request)
    {
        $level = request()->segment(2);
        return view('managementUser.tambahUser', [
            'title' => 'Tambah User',
            'active' => 'tambah user',
            'level' => $level,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['level'] = $request->level;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/user/management')->with('success', 'Registrasi Berhasil!');
    }

    public function editUser($id)
    {
        $id = base64_decode($id);
        $user = DB::table('Users')
            ->where('id', $id)
            ->select('id', 'name', 'email')
            ->get();
        return view('managementUser.editUser', [
            "title" => "Edit User",
            'active' => 'edit user',
            'user' => $user,
            'id' => $id
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $id = base64_decode($id);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email,' . $id,
            'password' => 'nullable|min:5|max:255'
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect('/user/management')->with('success', 'Data user berhasil diupdate!');
    }

    public function hapusUser($id)
    {
        $id = base64_decode($id);
        User::where('id', $id)->delete();

        return redirect('/user/management')->with('success');
    }
}
