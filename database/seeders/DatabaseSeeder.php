<?php

namespace Database\Seeders;

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
        KotaKabupaten::class
    ]);

        // \App\Models\User::factory(10)->create();
    }
}
