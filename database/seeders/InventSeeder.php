<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invent')->insert([
            'id_invent' => 'A1',
            'nama_barang' => 'Jas',
            'jml_barang' => '5',
            'kondisi_barang' => 'Baik',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('invent')->insert([
            'id_invent' => 'A2',
            'nama_barang' => 'Bendera IMM',
            'jml_barang' => '20',
            'kondisi_barang' => 'Baik',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
