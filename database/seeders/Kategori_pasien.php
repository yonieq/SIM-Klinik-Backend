<?php

namespace Database\Seeders;

use App\Models\Kategori_pasien as ModelsKategori_pasien;
use Illuminate\Database\Seeder;

class Kategori_pasien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsKategori_pasien::create([
            'name' => 'Pasien Umum'
        ]);
        ModelsKategori_pasien::create([
            'name' => 'Pasien BPJS'
        ]);
    }
}
