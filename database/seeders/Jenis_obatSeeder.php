<?php

namespace Database\Seeders;

use App\Models\Jenis_obat;
use Illuminate\Database\Seeder;

class Jenis_obatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis_obat::create([
            'nama'=>'Pil'
        ]);
        Jenis_obat::create([
            'nama'=>'Kapsul'
        ]);
        Jenis_obat::create([
            'nama'=>'Kaplet'
        ]);
    }
}
