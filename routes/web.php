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
    Route::get('/', [Home::class, 'index'])->name('home');
    Route::get('/login-siswa', [AuthSiswa::class, 'login'])->name('get.loginSiswa');
    Route::post('/login-siswa', [AuthSiswa::class, 'login'])->name('post.loginSiswa');
    Route::get('/login-guru', [AuthGuru::class, 'login'])->name('get.loginGuru');
    Route::post('/login-guru', [AuthGuru::class, 'login'])->name('post.loginGuru');
    Route::get('/login-admin', [AuthAdmin::class, 'login'])->name('get.loginAdmin');
    Route::post('/login-admin', [AuthAdmin::class, 'login'])->name('post.loginAdmin');
});

Route::middleware('auth:siswa')->group(function (){
    Route::get('/dashboard-siswa', [DashboardSiswa::class, 'index'])->name('get.dashboardSiswa');
    Route::get('/logout-siswa', [AuthSiswa::class, 'logout'])->name('get.logoutSiswa');
});

Route::middleware('auth:guru')->group(function(){
    Route::get('/dashboard-guru', [DashboardGuru::class, 'index'])->name('get.dashboardGuru');
    Route::get('/logout-guru', [AuthGuru::class, 'logout'])->name('get.logoutGuru');
});

Route::middleware('auth:admin')->group(function (){
    Route::get('/superadmin/dashboard', [DashboardSuperadmin::class, 'index'])->name('get.dashboardSuperadmin');
    Route::get('/superadmin/logout', [AuthAdmin::class, 'logout'])->name('get.logoutSuperadmin');
    Route::get('/superadmin/kelas/semua', [SiswaSuperadmin::class, 'indexSemuaKelas'])->name('get.semuaKelasSuperadmin');
    Route::get('/superadmin/kelas/{id}', [SiswaSuperadmin::class, 'indexkelas'])->name('get.indexKelasSuperadmin');
    Route::get('/superadmin/admin', [AdminSuperadmin::class, 'index'])->name('get.indexAdminSuperadmin');
});
