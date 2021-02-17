<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class DashboardSuperadminController extends Controller
{
    public function index(){
        $jumlahKelas = Kelas::count();
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahAdmin = Admin::where('wewenang', '!=', 'superadmin')->count();
        $queryTingkat = Kelas::getTingkat();
        return view('admin.super.dashboardSuperadmin',[
            'jumlahKelas' => $jumlahKelas,
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahAdmin' => $jumlahAdmin,
            'tingkat' => $queryTingkat
        ]);
    }
}
