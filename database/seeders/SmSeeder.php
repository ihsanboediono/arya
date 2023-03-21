<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sm')->insert([
            'tgl_sm' => '2021-10-16',
            'no_sm' => '014/A-1/XI/2021',
            'pengirim' => 'PC IMM Kota Surakarta',
            'perihal' => 'Surat Keputusan',
            'ket_sm' => 'Pengesahan Struktural PK IMM Adam Malik 2021/2022',
            'file_sm' => 'upload'
        ]);
        DB::table('sm')->insert([
            'tgl_sm' => '2021-10-19',
            'no_sm' => '014/BEM-FKI-UMS/X/2021',
            'pengirim' => 'BEM FKI UMS',
            'perihal' => 'Undangan',
            'ket_sm' => 'Rapat Koordinasi bersama Dekanat FKI',
            'file_sm' => 'upload'
        ]);
        DB::table('sm')->insert([
            'tgl_sm' => '2021-10-21',
            'no_sm' => '02/Pan-Upgrading/A-9/XI/2021',
            'pengirim' => 'PK IMM Averroes',
            'perihal' => 'Pemberitahuan',
            'ket_sm' => 'Upgrading',
            'file_sm' => 'upload'
        ]);
    }
}
