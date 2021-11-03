<?php

namespace Database\Seeders;

use App\Models\Jadwal_Dokter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Jadwal_dokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $path = 'app/sql/jadwal_dokter.sql';
        // $sql = file_get_contents($path);
        // DB::unprepared($sql);
        Jadwal_Dokter::create([
            'dokter'=>1,
            'hari'=>'senin',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:00',
            'jam_akhir'=>'11:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>1,
            'hari'=>'selasa',
            'poliklinik'=>'2',
            'jam_mulai'=>'13:00',
            'jam_akhir'=>'16:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>1,
            'hari'=>'rabu',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:00',
            'jam_akhir'=>'11:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>1,
            'hari'=>'jumat',
            'poliklinik'=>'2',
            'jam_mulai'=>'13:00',
            'jam_akhir'=>'16:00'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>1,
            'hari'=>'sabtu',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:30',
            'jam_akhir'=>'11:30'
        ]);

        Jadwal_Dokter::create([
            'dokter'=>2,
            'hari'=>'senin',
            'poliklinik'=>'2',
            'jam_mulai'=>'13:00',
            'jam_akhir'=>'16:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>2,
            'hari'=>'selasa',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:00',
            'jam_akhir'=>'11:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>2,
            'hari'=>'kamis',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:00',
            'jam_akhir'=>'11:30'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>2,
            'hari'=>'jumat',
            'poliklinik'=>'2',
            'jam_mulai'=>'08:00',
            'jam_akhir'=>'11:00'
        ]);
        Jadwal_Dokter::create([
            'dokter'=>2,
            'hari'=>'sabtu',
            'poliklinik'=>'2',
            'jam_mulai'=>'13:00',
            'jam_akhir'=>'16:00'
        ]);
    }
}
