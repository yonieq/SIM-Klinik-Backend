<?php

namespace Database\Seeders;

use App\Models\Layanan_pasien;
use Illuminate\Database\Seeder;

class LayananPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan_pasien::create([
            'pasien'=>'1',
            'layanan'=>'2',
            'no_layanan'=>'1234567890123456'
        ]);
        Layanan_pasien::create([
            'pasien'=>'2',
            'layanan'=>'1',
            'no_layanan'=>''
        ]);
    }
}
