<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_layanan extends Model
{
    use HasFactory;
    public function pasien()
    {
        return $this->hasMany(Layanan_pasien::class,'layanan');
    }
}
