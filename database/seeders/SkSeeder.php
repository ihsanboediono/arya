<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sk')->insert([
            'tgl_sk' => '2021-10-16',
            'no_sk' => '001/A-9/XI/2021',
            'tujuan' => 'PC IMM Kota Surakarta',
            'perihal_sk' => 'Pemberitahuan',
            'ket_sk' => 'Upgrading',
            'file_sk' => 'upload'
        ]);
        DB::table('sk')->insert([
            'tgl_sk' => '2021-10-16',
            'no_sk' => '002/A-9/XI/2021',
            'tujuan' => 'Keluarga Besar PK IMM Adam Malik',
            'perihal_sk' => 'Undangan',
            'ket_sk' => 'Upgrading',
            'file_sk' => 'upload'
        ]);
        DB::table('sk')->insert([
            'tgl_sk' => '2021-10-21',
            'no_sk' => '003/A-9/XI/2021',
            'tujuan' => 'IMMawan Banu Adzkar',
            'perihal_sk' => 'Permohonan Pembicara',
            'ket_sk' => 'Upgrading',
            'file_sk' => 'upload'
        ]);
    }
}
