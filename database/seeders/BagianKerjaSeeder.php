<?php

namespace Database\Seeders;

use App\Models\Bagian_kerja;
use Illuminate\Database\Seeder;

class BagianKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bagian_kerja::create([
            'kerja' => 'administrasi',
            'role'=>'1'
        ]);
        Bagian_kerja::create([
            'kerja' => 'kasir',
            'role'=>'2'
        ]);
        Bagian_kerja::create([
            'kerja' => 'administrator',
            'role'=>'3'
        ]);
        Bagian_kerja::create([
            'kerja' => 'kepala apotek',
            'role'=>'4'
        ]);
        Bagian_kerja::create([
            'kerja' => 'apotek',
            'role'=>'7'
        ]);
        Bagian_kerja::create([
            'kerja' => 'perawat',
            'role'=>'8'
        ]);
        Bagian_kerja::create([
            'kerja' => 'keuangan',
            'role'=>'9'
        ]);
        Bagian_kerja::create([
            'kerja' => 'pendaftaran',
            'role'=>'10'
        ]);
    }
}
