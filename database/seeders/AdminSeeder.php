<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'nama_lengkap' => 'Sigit Boworaharjo',
                'email' => 'kangteknisi@gmail.com',
                'password' => bcrypt('superadmin'),
                'wewenang' => 'superadmin',
                'deskripsi' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_lengkap' => 'Sundoyo',
                'email' => 'sundoyo@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' => 'kesiswaaan',
                'deskripsi' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_lengkap' => 'Risky Pay',
                'email' => 'riskyyunianto@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' =>'kurikulum',
                'deskripsi' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_lengkap' => 'Elsa',
                'email' => 'elsa@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' => 'toolman',
                'deskripsi' => null,
                'id_jurusan_ref' => 1
            ]
        ]);
    }
}
