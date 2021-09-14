<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $table ="antrian";
    protected $fillable = [
        'no_antri',
        'nik',
        'tgl_periksa',
        'dokter',
        'status'
    ];
}
