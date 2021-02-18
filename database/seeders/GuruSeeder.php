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
                'nama_guru' => 'Alawy Djufri',
                'email_guru' => 'alawy@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '0823232444'
            ],
            [
                'nama_guru' => 'rusmani',
                'email_guru' => 'rusmani@gail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '08989343434'
            ],
            [
                'nama_guru' => 'Umi Kulsum',
                'email_guru' => 'umikulsum@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '909084343555'
            ],
            [
                'nama_guru' => 'Dwi Cahyo',
                'email_guru' => 'dwicahyo@gmail.com',
                'password' => bcrypt('password'),
                'no_ponsel' => '089393993994'
            ]
        ]);
    }
}
