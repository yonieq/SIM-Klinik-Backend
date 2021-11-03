<?php

namespace App\Models;

use Database\Seeders\Jadwal_dokterSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;
    protected $table = 'poliklinik';
    protected $fillable =[
        'nama'
    ];
    public function jadwal_dokter()
    {
        return $this->hasMany(Jadwal_Dokter::class, 'poliklinik');
    }
}
