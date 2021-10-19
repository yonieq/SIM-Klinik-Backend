<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dokterpoli_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'app/sql/dokterpoli.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);

    }
}