<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pasien::create([
            'no_kartu'=>'211011000001',
            'nama'=>'Bambang',
            'nik'=>'1234567890123456',
            'tempat_lahir'=>28,
            'tanggal_lahir'=>'1989-04-09',
            'jenis_kelamin'=>'L',
            'alamat'=>'Kabupaten Tegal, Dukuhturi, Desa Kupu, RT/RW 02/03, kupu',
            'agama'=>'Islam',
            'no_telepon'=>'62890000999098',
            'usia'=>21,
            'gol_darah'=>'A',
            'pekerjaan'=>''
        ]);
        Pasien::create([
            'no_kartu'=>'211011000002',
            'nama'=>'Budi',
            'nik'=>'1234567890123459',
            'tempat_lahir'=>28,
            'tanggal_lahir'=>'1989-04-09',
            'jenis_kelamin'=>'L',
            'alamat'=>'Kabupaten Tegal, Kec. Dukuhturi, Desa Kupu, RT/RW 02/03, ',
            'agama'=>'Islam',
            'no_telepon'=>'6289000667676',
            'usia'=>21,
            'gol_darah'=>'Belum Diketahui',
            'pekerjaan'=>''
        ]);
    }
}
