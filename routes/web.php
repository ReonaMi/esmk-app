<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\Auth\AuthSiswaController as AuthSiswa;
use App\Http\Controllers\Auth\AuthGuruController as AuthGuru;
use App\Http\Controllers\Auth\AuthAdminController as AuthAdmin;
use App\Http\Controllers\Guru\DashboardGuruController as DashboardGuru;
use App\Http\Controllers\Admin\Superadmin\DashboardSuperadminController as DashboardSuperadmin;
use App\Http\Controllers\Siswa\DashboardSiswaController as DashboardSiswa;
use App\Http\Controllers\Admin\Superadmin\SiswaSuperadminController as SiswaSuperadmin;
use App\Http\Controllers\Admin\Superadmin\AdminSuperadminController as AdminSuperadmin;
use App\Http\Controllers\Admin\Superadmin\GuruSuperadminController as GuruSuperadmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function(){
    // routing home
    Route::get('/', [Home::class, 'index'])->name('home');
    // routing login siswa
    Route::get('/login-siswa', [AuthSiswa::class, 'login'])->name('get.loginSiswa');
    Route::post('/login-siswa', [AuthSiswa::class, 'login'])->name('post.loginSiswa');
    // routing login guru
    Route::get('/login-guru', [AuthGuru::class, 'login'])->name('get.loginGuru');
    Route::post('/login-guru', [AuthGuru::class, 'login'])->name('post.loginGuru');
    // routing login admin
    Route::get('/login-admin', [AuthAdmin::class, 'login'])->name('get.loginAdmin');
    Route::post('/login-admin', [AuthAdmin::class, 'login'])->name('post.loginAdmin');
});

Route::middleware('auth:siswa')->group(function (){
    // routing dashboard siswa
    Route::get('/dashboard-siswa', [DashboardSiswa::class, 'index'])->name('get.dashboardSiswa');
    // routing logout siswa
    Route::get('/logout-siswa', [AuthSiswa::class, 'logout'])->name('get.logoutSiswa');
});

Route::middleware('auth:guru')->group(function(){
    // routing dashboard guru
    Route::get('/dashboard-guru', [DashboardGuru::class, 'index'])->name('get.dashboardGuru');
    // routing logout guru
    Route::get('/logout-guru', [AuthGuru::class, 'logout'])->name('get.logoutGuru');
});

Route::middleware('auth:admin')->group(function (){
    // routing dashboard superadmin
    Route::get('/superadmin/dashboard', [DashboardSuperadmin::class, 'index'])->name('get.dashboardSuperadmin');
    // routing logout superadmin
    Route::get('/superadmin/logout', [AuthAdmin::class, 'logout'])->name('get.logoutSuperadmin');
    // routing kelas/siswa - superadmin
    Route::get('/superadmin/kelas/semua', [SiswaSuperadmin::class, 'indexSemuaKelas'])->name('get.semuaKelasSuperadmin');
    Route::get('/superadmin/kelas/{id}', [SiswaSuperadmin::class, 'indexkelas'])->name('get.indexKelasSuperadmin');
    Route::get('/superadmin/siswa/{id}', [SiswaSuperadmin::class, 'detailSiswa'])->name('get.detailSiswa');
    // routing guru - superadmin
    Route::get('/superadmin/guru', [GuruSuperadmin::class, 'indexGuru'])->name('get.indexGuruSuperadmin');
    Route::get('/superadmin/guru/{id}', [GuruSuperadmin::class, 'detailGuru'])->name('get.detailGuruSuperadmin');
    // routing manajemen admin - superadmin
    Route::get('/superadmin/admin', [AdminSuperadmin::class, 'index'])->name('get.indexAdminSuperadmin');
});
