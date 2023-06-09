<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Beli::create([
            
            'jumlah_beli' => '5',
            'harga_beli' => '215000',
            'id_barang' => '1',
            'id_supplier' =>'5',
        ]);

        \App\Models\Beli::create([
            
            'jumlah_beli' => '20',
            'harga_beli' => '140000',
            'id_barang' => '2',
            'id_supplier' =>'4',
        ]);

        \App\Models\Beli::create([
            
            'jumlah_beli' => '20',
            'harga_beli' => '225000',
            'id_barang' => '3',
            'id_supplier' =>'1',
        ]);

        \App\Models\Beli::create([
            
            'jumlah_beli' => '12',
            'harga_beli' => '350000',
            'id_barang' => '4',
            'id_supplier' =>'2',
        ]);

        \App\Models\Beli::create([
            
            'jumlah_beli' => '15',
            'harga_beli' => '630000',
            'id_barang' => '5',
            'id_supplier' =>'1',
        ]);
    }
}
