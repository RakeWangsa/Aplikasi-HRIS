<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ManagementController;

Route::get('/tes', [LoginController::class, 'tes'])->name('tes')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:karyawan']], function () {
    route::get('/employee/dashboard', [DashboardController::class, 'dash_karyawan']);
    route::get('/employee/absensi', [AbsensiController::class, 'absensi_karyawan']);
    route::post('/employee/absensi/datang/{status}', [AbsensiController::class, 'absensi_karyawan_datang'])->name('absenDatang');
    route::post('/employee/absensi/pulang/{status}', [AbsensiController::class, 'absensi_karyawan_pulang'])->name('absenPulang');
    route::get('/timesheet/time-tracker', [TimesheetController::class, 'timesheet_karyawan']);
    route::post('/timesheet/time-tracker/submit', [TimesheetController::class, 'submitTimesheet'])->name('submitTimesheet');
    route::get('/employee/kpi', [PenilaianController::class, 'kpi_karyawan']);
    route::post('/employee/kpi/isiKPI', [PenilaianController::class, 'isi_KPI'])->name('isiKPI');
    route::get('/employee/okr', [PenilaianController::class, 'okr_karyawan']);
});

Route::group(['middleware' => ['auth', 'ceklevel:executive']], function () {
    route::get('/executive/dashboard', [DashboardController::class, 'dash_executive']);
    route::get('/executive/profile', [ProfileController::class, 'profile_karyawan']);
    route::get('/daftar/karyawan', [ProfileController::class, 'profile_executive']);
    route::get('/executive/timesheet', [TimesheetController::class, 'timesheet_executive']);
    route::post('/executive/timesheet/filter', [TimesheetController::class, 'filterTimesheet'])->name('filterTimesheet');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    route::get('/admin/dashboard', [DashboardController::class, 'dash_admin'])->middleware('auth');
    route::get('/daftar/absensi', [AbsensiController::class, 'daftar_absensi'])->middleware('auth');
    route::post('/daftar/absensi/settingBatasAbsen', [AbsensiController::class, 'settingBatasAbsen'])->name('settingBatasAbsen')->middleware('auth');
    route::get('/admin/profiles', [ProfileController::class, 'profile_admin'])->middleware('auth');
    route::post('/admin/profiles/updateJob', [ProfileController::class, 'updateJob'])->name('updateJob')->middleware('auth');
    route::get('/user/management', [ManagementController::class, 'index'])->middleware('auth');
    route::get('/admin/kpi', [PenilaianController::class, 'kpi_admin'])->middleware('auth');
    route::get('/admin/kpi/{divisi}', [PenilaianController::class, 'kpi_admin_filter'])->name('kpi_admin_filter')->middleware('auth');
    route::post('/admin/kpi/addKPI', [PenilaianController::class, 'add_KPI'])->name('addKPI')->middleware('auth');
    route::post('/admin/kpi/updateKPI/{id}', [PenilaianController::class, 'update_KPI'])->name('updateKPI')->middleware('auth');
    route::get('/admin/kpi/hapusKPI/{id}', [PenilaianController::class, 'hapus_KPI'])->name('hapusKPI')->middleware('auth');
    route::get('/admin/kpi/hasilKPI', [PenilaianController::class, 'hasil_KPI'])->name('hasilKPI')->middleware('auth');
    route::get('/admin/okr', [PenilaianController::class, 'okr_admin'])->middleware('auth');
    route::post('/admin/okr/addOKR', [PenilaianController::class, 'addOKR'])->name('addOKR')->middleware('auth');
    route::post('/admin/okr/updateStatusOKR', [PenilaianController::class, 'updateStatusOKR'])->name('updateStatusOKR')->middleware('auth');
    route::get('/admin/okr/deleteOKR/{id}', [PenilaianController::class, 'deleteOKR'])->name('deleteOKR')->middleware('auth');
    Route::get('/editUser/{id}', [ManagementController::class, 'editUser'])->name('editUser')->middleware('auth');
    Route::get('/updateUser/{id}', [ManagementController::class, 'updateUser'])->name('updateUser');
    Route::get('/hapusUser/{id}', [ManagementController::class, 'hapusUser'])->name('hapusUser')->middleware('auth');
    Route::get('/tambahUser/{level}', [ManagementController::class, 'tambah'])->name('tambahUser')->middleware('auth');
    Route::post('/tambahUser', [ManagementController::class, 'store'])->middleware('auth');
    route::get('/admin/task-timesheet', [TimesheetController::class, 'task_timesheet'])->middleware('auth');
    route::post('/admin/task-timesheet/addTask', [TimesheetController::class, 'addTask'])->name('addTask')->middleware('auth');
    route::get('/admin/task-timesheet/deleteTask/{id}', [TimesheetController::class, 'deleteTask'])->name('deleteTask')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'ceklevel:executive,admin']], function () {
    route::post('/submitPengumuman', [DashboardController::class, 'submitPengumuman'])->name('submitPengumuman');
});

Route::group(['middleware' => ['auth', 'ceklevel:executive,admin,karyawan']], function () {
    route::get('/profile', [ProfileController::class, 'profile']);
    route::post('/profile/edit', [ProfileController::class, 'editProfile'])->name('editProfile');
    route::post('/profile/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    route::post('/profile/changeImage', [ProfileController::class, 'changeImage'])->name('changeImage');
    route::get('/profile/deleteImage', [ProfileController::class, 'deleteImage'])->name('deleteImage');
});

