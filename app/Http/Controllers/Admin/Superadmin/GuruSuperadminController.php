<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class GuruSuperadminController extends Controller
{

    public $tingkat;

    public function __construct(){
        $this->tingkat = Kelas::getTingkat();
    }

    public function indexGuru(){
        $title = "Guru";
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
            "tingkat" => $this->tingkat
        ]);
    }

    public function detailGuru($id){
        $decryptId = Crypt::decrypt($id);
        $tingkat = Kelas::getTingkat();
        $query = Guru::where('id_guru', $decryptId)
            ->get();

        $data = [];
        foreach ($query as $item){
            $data["nama_guru"] = $item->nama_lengkap;
            $data["email_guru"] = $item->email;
            $data["no_ponsel"] = $item->no_ponsel;
        }

        return view('admin.super.detailGuruSuperadmin', [
            "tingkat" => $tingkat,
            "data" => $data
        ]);
    }
}
