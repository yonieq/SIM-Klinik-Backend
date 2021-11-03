<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    public function layanan()
    {
        return $this->hasOne(Layanan_pasien::class,"pasien");
    }
    public function antrian()
    {
        return $this->hasMany(Antrian::class,"pasien");
    }
    public function status()
    {
        return $this->hasOne(Status_pasien::class,"pasien");
    }
    public function tempat_lahir()
    {
        return $this->belongsTo(KotaKabupaten::class,'tempat_lahir');
    }
    public function transaksi()
    {
        return $this->hasOne(Transaksi_pasien::class,"pasien");
    }
}
