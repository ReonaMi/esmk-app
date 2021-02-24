<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;

class GuruSuperadminController extends Controller
{
    public function indexGuru(){
        $title = "Guru";
        $queryTingkat = Kelas::getTingkat();

        $query = Guru::all();

        if (request()->ajax()){
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', 'admin.super.datatables.btnGuru')
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.super.guruSuperadmin', [
            "title" => $title,
            "tingkat" => $queryTingkat
        ]);
    }
}
