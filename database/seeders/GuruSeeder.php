<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert([
            [
                'nama_lengkap' => 'Alawy Djufri',
                'email' => 'alawy@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '0823232444',
                'NIK' => 3566776554454321,
                'alamat' => 'xxxx',
                'kode_pos' => 62155
            ],
            [
                'nama_guru' => 'rusmani',
                'email' => 'rusmani@gail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '08989343434',
                'NIK' => 3566776554454322,
                'alamat' => 'xxxx',
                'kode_pos' => 62155
            ],
            [
                'nama_guru' => 'Umi Kulsum',
                'email' => 'umikulsum@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '909084343555',
                'NIK' => 3566776554454323,
                'alamat' => 'xxxx',
                'kode_pos' => 62155
            ],
            [
                'nama_guru' => 'Dwi Cahyo',
                'email' => 'dwicahyo@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '089393993994',
                'NIK' => 3566776554454324,
                'alamat' => 'xxxx',
                'kode_pos' => 62155
            ]
        ]);
    }
}
