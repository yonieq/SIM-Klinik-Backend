<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GanerateCodeAntrian extends Controller
{
    static function ganerate($table, $colDate, $date, $colw1, $valw1, $colw2, $valw2, $key, $col)
    {
        $x = DB::table($table)->where([
            $colDate => $date,
            $colw1 => $valw1,
            $colw2 => $valw2
        ])->count();
        if ($x == 0) {
            $date = Carbon::parse($date)->isoFormat('YY-MM-DD');
            $valw2 = Carbon::parse($valw2)->format('H:i');
            $result = $key  .'|'. str_replace("-", "", $date) .'|'. str_replace(":", "", $valw2) . "-0001";
        } else {
            $kode = DB::table($table)->where([
                $colDate => $date,
                $colw1 => $valw1,
                $colw2 => $valw2
            ])->orderBy('id', 'desc')->first($col)->$col;
            $sring = explode("-", $kode);
            $last = sprintf("%'03d", $sring[1] + 1);
            $date = Carbon::parse($date)->isoFormat('YY-MM-DD');
            $valw2 = Carbon::parse($valw2)->format('H:i');
            $result = $key  .'|'. str_replace("-", "", $date) .'|'. str_replace(":", "", $valw2) . "-" . $last;
        }
        return $result;
    }
}
