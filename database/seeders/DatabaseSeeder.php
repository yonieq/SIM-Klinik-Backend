<?php

namespace Database\Seeders;

use App\Models\Bagian_kerja;
use App\Models\Karyawan;
use Database\Seeders\users as SeedersUsers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    $this->call([
        SeedersUsers::class,
        KotaKabupaten::class,
        Kategori_pasien::class,
        pasien::class,
        PoliklinikSeeder::class,
        Dokterpoli_seeder::class,
        Jadwal_dokterSeeder::class,
        RoleSeeder::class,
        BagianKerjaSeeder::class,
        KaryawanSeeder::class,
        DokterSeeder::class
    ]);

        // \App\Models\User::factory(10)->create();
    }
}
