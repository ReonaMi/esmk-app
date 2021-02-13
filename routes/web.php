<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\Auth\AuthSiswaController as AuthSiswa;
use App\Http\Controllers\Auth\AuthGuruController as AuthGuru;
use App\Http\Controllers\Auth\AuthAdminController as AuthAdmin;

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
    Route::get('/', [Home::class, 'index']);
    Route::get('/login-siswa', [AuthSiswa::class, 'login'])->name('get.loginSiswa');
    Route::post('/login-siswa', [AuthSiswa::class, 'login'])->name('post.loginSiswa');
    Route::get('/login-guru', [AuthGuru::class, 'login'])->name('get.loginGuru');
    Route::post('/login-guru', [AuthGuru::class, 'login'])->name('post.loginGuru');
    Route::get('/login-admin', [AuthAdmin::class, 'login'])->name('get.loginAdmin');
    Route::post('/login-admin', [AuthAdmin::class, 'login'])->name('post.loginAdmin');
});
