<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan_pasien extends Model
{
    use HasFactory;
    public function layanan()
    {
        return $this->belongsTo(Jenis_layanan::class,"layanan");
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class,"pasien");
    }
}
