<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function profile()
    {
        $email = session('email');
        $user = DB::table('Users')
        ->where('email', $email)
        ->select('*')
        ->first();
        return view('profiles.profile ', [
            'title' => 'My Profile',
            'active' => 'profile_karyawan',
            'user' => $user
        ]);
    }

    public function editProfile(Request $request)
    {
        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();
        $profile = User::find($id_user);
        $profile->update([
            'name' => $request->fullName,
            'about' => $request->about,
            'company' => $request->company,
            'country' => $request->country,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        session(['email' => $request->email]);
        return redirect('/profile');  
    }

    public function changePassword(Request $request)
    {
        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();
        $password_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('password')
        ->first();
        $password = $request->password;
        $newpassword = $request->newpassword;
        if(Hash::check($password, $password_user)){
            $profile = User::find($id_user);
            $profile->update([
                'password' => Hash::make($newpassword),
            ]);
        }else{
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
        return redirect('/profile');  
    }

    public function changeImage(Request $request)
    {
        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();
        $gambar = $request->file('profileImage');
        $namaGambar = uniqid() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('img'), $namaGambar);

        $profile = User::find($id_user);
        $profile->update([
            'image' => $namaGambar
        ]);
        return redirect('/profile');  
    }

    public function deleteImage()
    {
        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();


        $profile = User::find($id_user);
        $imageName = $profile->image;

        $profile->update([
            'image' => 'blank-profile-picture.png'
        ]);

        $imagePath = public_path('img') . '/' . $imageName;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        return redirect('/profile');  
    }

    public function profile_executive()
    {
        $users = DB::table('Users')
        ->select('*')
        ->get();
        return view('profiles.executive', [
            'title' => 'Daftar Karyawan',
            'active' => 'profile_executive',
            'users' => $users
        ]);
    }

    public function profile_admin()
    {
        $users = DB::table('Users')
        ->select('*')
        ->get();
        return view('profiles.admin', [
            'title' => 'Profiles',
            'active' => 'profile_admin',
            'users' => $users
        ]);
    }

    public function updateJob(Request $request)
    {
        $id_user = $request->id_user;
        $profile = User::find($id_user);
        $profile->update([
            'job' => $request->job,
            'jabatan' => $request->jabatan
        ]);
        return redirect('/admin/profiles');  
    }
}
