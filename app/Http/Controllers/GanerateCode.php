<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GanerateCode extends Controller
{
    //
    static function ganerate($table, $key, $col){
        $x = DB::table($table)->count();
        if ($x == 0) {
            $result = $key."-0001";
        } else {
            $kode =DB::table('obat')->orderBy('id','desc')->first($col)->$col;
            $sring = explode("-", $kode);
            $last = sprintf("%'03d", $sring[1]+1);
            $result = $key."-".$last;
        }
        return $result;
    }
}
