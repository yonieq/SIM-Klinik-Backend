<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'foto'=>'',
            'nik'=>'1234567890123456',
            'nama'=>'dr. Thomas Alfa Edison S.teh',
            'tempat_lahir'=>'10',
            'tanggal_lahir'=>'1990-10-17',
            'jenis_kelamin'=>'laki-laki',
            'agama'=>'katholik',
            'gol_dar'=>'ab',
            'alamat'=>'bandung, cinere, cileungsi',
            'poliklinik'=>'2',
            'no_hp'=>'6285654582227',
            'no_sip'=>'43247854535799',
            'no_str'=>'15493200646528',
            'masa_sip'=>'2024-10-15',
            'masa_str'=>'2024-10-15',
            'lembaga_regist_sip'=>'Ikatan Dokter Indonesia'
        ]);
    }
}
