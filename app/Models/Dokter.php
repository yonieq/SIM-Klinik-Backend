<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table ="dokter";
    public function jadwal_dokter()
    {
        return $this->hasMany(Jadwal_Dokter::class, 'dokter');
    }
}
