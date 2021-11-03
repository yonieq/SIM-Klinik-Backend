<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Dokter extends Model
{
    use HasFactory;
    protected $table ='jadwal_dokter';
    // protected $fillable= [
    //     'dokter_id',
    //     'hari',
    //     'poli',
    //     'jam_mulai',
    //     'jam_akhir'
    // ];
    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'dokter');
    }
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class,'poliklinik');
    }
}
