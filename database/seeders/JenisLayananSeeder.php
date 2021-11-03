<?php

namespace Database\Seeders;

use App\Models\Jenis_layanan;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis_layanan::create([
            'nama'=>'Umum'
        ]);
        Jenis_layanan::create([
            'nama'=>'BPJS Kesehatan'
        ]);
        Jenis_layanan::create([
            'nama'=>'KIS'
        ]);
        Jenis_layanan::create([
            'nama'=>'dll'
        ]);
    }
}
