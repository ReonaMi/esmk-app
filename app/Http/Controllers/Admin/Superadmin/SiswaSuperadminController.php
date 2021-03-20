<?php

namespace App\Http\Controllers\Admin\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class SiswaSuperadminController extends Controller
{
    public $tingkat;

    public function __construct(){
        $this->tingkat = Kelas::getTingkat();
    }

    public function indexSemuaKelas(){
        $title = "Semua Kelas";
        $queryTingkat = Kelas::getTingkat();

        $query = Kelas::join('siswa', 'siswa.id_kelas_ref', 'kelas.id_kelas')
                    ->orderBy('tingkat', 'asc')
                    ->orderBy('kelas', 'asc')
                    ->orderBy('nama_lengkap', 'asc')
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
            "tingkat" => $this->tingkat
        ]);
    }

    public function indexkelas($id){

        $title = "Kelas ".$id;

        $query = Kelas::where('tingkat', $id)
            ->join('siswa', 'siswa.id_kelas_ref', 'kelas.id_kelas')
            ->get();

        $collection = collect($query)
                ->sortBy(function($data, $key){
                    return $data["kelas"].$data["nama_lengkap"];
                });

        if (request()->ajax()){
            return DataTables::of($collection)
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
            "tingkat" => $this->tingkat,
            "paramURL" => $id
        ]);
    }

    public function detailSiswa($id){
        $decryptId = Crypt::decrypt($id);
        $query = Siswa::where('id_siswa', $decryptId)
                    ->join('kelas', 'siswa.id_kelas_ref', 'kelas.id_kelas')
                    ->join('jurusan', 'kelas.id_jurusan_ref', 'jurusan.id_jurusan')
                    ->get();
        $data = [];
        foreach ($query as $item){
            $data["nama_lengkap"] = $item->nama_lengkap;
            $data["NIK"] = $item->NIK;
            $data["email"] = $item->email;
            $data["password"] = $item->password;
            $data["alamat"] = $item->alamat;
            $data["kode_pos"] = $item->kode_pos;
            $data["latitude"] = $item->latitude;
            $data["longitude"] = $item->longitude;
            $data["tahun_masuk"] = $item->tahun_masuk;
            $data["tahun_lulus"] = $item->tahun_lulus;
            $data["status"] = $item->status;
            $data["no_ponsel"] = $item->no_ponsel;
            $data["nama_ayah"] = $item->nama_ayah;
            $data["nama_ibu"] = $item->nama_ibu;
            $data["no_ponsel_ortu"] = $item->no_ponsel_orang_tua;
            $data["nama_wali"] = $item->nama_wali;
            $data["no_ponsel_wali"] = $item->no_ponsel_wali;
            $data["tingkat"] = $item->tingkat;
            $data["kelas"] = $item->kelas;
            $data["nama_jurusan"] = $item->nama_jurusan;
        }

        return view("admin.super.detailSiswaSuperadmin", [
           "tingkat" => $this->tingkat,
           "data" => $data
        ]);
    }
}
