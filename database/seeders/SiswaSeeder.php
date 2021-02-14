<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'nama_siswa' => 'Rei Han',
                'id_kelas_ref' => 1,
                'email_siswa' => 'reihan@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'nama_siswa' => 'ReiH',
                'id_kelas_ref' => 1,
                'email_siswa' => 'reihaan@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'nama_siswa' => 'Sigit Boworaharjo',
                'id_kelas_ref' => 1,
                'email_siswa' => 'kangsigit@gmail.com',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
