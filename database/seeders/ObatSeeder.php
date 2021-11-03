<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obat::create([
            'kode'=>'OB000001',
            'nama'=>'Parasetamol',
            'jenis'=>1,
            'kadaluarsa'=>'2025-10-11',
            'stok'=>200,
            'harga'=>1000
        ]);
        Obat::create([
            'kode'=>'OB000002',
            'nama'=>'Amoksilin',
            'jenis'=>1,
            'kadaluarsa'=>'2025-10-11',
            'stok'=>200,
            'harga'=>900
        ]);
        Obat::create([
            'kode'=>'OB000003',
            'nama'=>'Asamefetamat',
            'jenis'=>1,
            'kadaluarsa'=>'2025-10-11',
            'stok'=>200,
            'harga'=>1500
        ]);
    }
}
