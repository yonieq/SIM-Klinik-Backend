<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tindakan::create([
            'nama'=>'Periksa umum',
            'harga'=>25000
        ]);
        Tindakan::create([
            'nama'=>'Pembersihan Telinga',
            'harga'=>45000
        ]);
    }
}
