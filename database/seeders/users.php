<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $path = public_path('sql/File.sql');
        $path = 'app/sql/users.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
