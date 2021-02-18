<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;

class SiswaSuperadminController extends Controller
{
    public function indexSemuaKelas(){
        $title = "Semua Kelas";
        $queryTingkat = Kelas::getTingkat();

        $query = Kelas::join('siswa', 'siswa.id_kelas_ref', 'kelas.id_kelas')
                    ->orderBy('tingkat', 'asc')
                    ->orderBy('kelas', 'asc')
                    ->orderBy('nama_siswa', 'asc')
                    ->get();

        if (request()->ajax()){
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('tingkat_kelas', function($row){
                    $val = $row->tingkat." ".$row->kelas;
                    return $val;
                })
                ->addColumn('aksi', 'admin.super.datatables.btnSiswa')
                ->rawColumns(['tingkat_kelas', 'aksi'])
                ->make(true);
        }

        return view('admin.super.kelasSuperadmin',[
            "title" => $title,
            "tingkat" => $queryTingkat
        ]);
    }

    public function indexkelas($id){

        $title = "Kelas ".$id;
        $tingkat = Kelas::getTingkat();

        $whereQuery = Kelas::where('tingkat', $id)
            ->join('siswa', 'siswa.id_kelas_ref', 'kelas.id_kelas')
            ->orderBy('kelas', 'asc')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        if (request()->ajax()){
            return DataTables::of($whereQuery)
                ->addIndexColumn()
                ->addColumn('tingkat_kelas', function($row){
                    $val = $row->tingkat." ".$row->kelas;
                    return $val;
                })
                ->addColumn('aksi', 'admin.super.datatables.btnSiswa')
                ->rawColumns(['tingkat_kelas', 'aksi'])
                ->make(true);
        }

        return view('admin.super.kelasSuperadmin', [
            "title" => $title,
            "tingkat" => $tingkat,
            "paramURL" => $id
        ]);
    }
}
