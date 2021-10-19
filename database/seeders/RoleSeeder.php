<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'administrasi'
        ]);
        Role::create([
            'role' => 'kasir'
        ]);
        Role::create([
            'role' => 'administrator'
        ]);
        Role::create([
            'role' => 'kepala apotek'
        ]);
        Role::create([
            'role' => 'owner'
        ]);
        Role::create([
            'role' => 'dokter'
        ]);
        Role::create([
            'role' => 'apotek'
        ]);
        Role::create([
            'role' => 'perawat'
        ]);
        Role::create([
            'role' => 'keuangan'
        ]);
        Role::create([
            'role' => 'pendaftaran'
        ]);
    }
}
