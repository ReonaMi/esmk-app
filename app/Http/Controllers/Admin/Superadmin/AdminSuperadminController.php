<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Admin;
use DataTables;

class AdminSuperadminController extends Controller
{
    public function index(){
        $title = "Manajemen Admin";
        $queryTingkat = Kelas::getTingkat();

        $query = Admin::where('wewenang', '!=', 'superadmin')
                    ->orderBy('wewenang', 'asc')
                    ->orderBy('nama_admin', 'asc')
                    ->get();

        if (request()->ajax()){
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', 'admin.super.datatables.btnAdmin')
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.super.adminSuperadmin',[
            'title' => $title,
            'tingkat' => $queryTingkat
        ]);
    }
}
