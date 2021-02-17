<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'tingkat',
        'kelas',
        'id_jurusan_ref'
    ];

    public static function getTingkat(){
        $query = Kelas::select('tingkat')->distinct()->get();
        return $query;
    }
}
