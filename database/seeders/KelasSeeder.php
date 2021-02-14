<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'tingkat' => "X",
                'kelas' => "TKJ 1",
                'id_jurusan_ref' => 1
            ],
            [
                'tingkat' => "X",
                'kelas' => "TKJ 2",
                'id_jurusan_ref' => 1
            ],
            [
                'tingkat' => "XI",
                'kelas' => "TKJ 1",
                'id_jurusan_ref' => 1
            ],
            [
                'tingkat' => "XI",
                'kelas' => "TKJ 2",
                'id_jurusan_ref' => 1
            ],
            [
                'tingkat' => "XII",
                'kelas' => "TKJ 1",
                'id_jurusan_ref' => 1
            ],
            [
                'tingkat' => "XII",
                'kelas' => "TKJ 2",
                'id_jurusan_ref' => 1
            ]
        ]);
    }
}
