<?php

namespace Database\Seeders;

use App\Models\Tindakan;
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
        PasienSeeder::class,
        PoliklinikSeeder::class,
        Dokterpoli_seeder::class,
        RoleSeeder::class,
        BagianKerjaSeeder::class,
        KaryawanSeeder::class,
        DokterSeeder::class,
        Jadwal_dokterSeeder::class,
        JenisLayananSeeder::class,
        LayananPasienSeeder::class,
        Jenis_obatSeeder::class,
        ObatSeeder::class,
        TindakanSeeder::class
    ]);

        // \App\Models\User::factory(10)->create();
    }
}
