<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karyawan::create([
            'foto'=>'',
            'nik'=>'1234567890123456',
            'nama'=>'Bagas',
            'tempat_lahir'=>'23',
            'tanggal_lahir'=>'1989-10-17',
            'jenis_kelamin'=>'laki-laki',
            'agama'=>'islam',
            'bagian_kerja'=>'1',
            'gol_dar'=>'a',
            'alamat'=>'lubuk linggau jalaan ......',
            'no_hp'=>'6285677777777',
            'mulai'=>'2021-10-15',
            'akhir'=>'2022-10-15',
            'sidik_jari'=>'belum',
        ]);
    }
}
