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
                'nama_admin' => 'Sigit Boworaharjo',
                'email_admin' => 'kangteknisi@gmail.com',
                'password' => bcrypt('superadmin'),
                'wewenang' => 'superadmin',
                'deskripsi_admin' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_admin' => 'Sundoyo',
                'email_admin' => 'sundoyo@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' => 'kesiswaaan',
                'deskripsi_admin' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_admin' => 'Risky Pay',
                'email_admin' => 'riskyyunianto@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' =>'kurikulum',
                'deskripsi_admin' => null,
                'id_jurusan_ref' => null
            ],
            [
                'nama_admin' => 'Elsa',
                'email_admin' => 'elsa@gmail.com',
                'password' => bcrypt('password'),
                'wewenang' => 'toolman',
                'deskripsi_admin' => null,
                'id_jurusan_ref' => 1
            ]
        ]);
    }
}
