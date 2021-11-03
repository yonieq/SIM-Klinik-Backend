<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
  use HasFactory;
  protected $table = "antrian";  
  public function status()
  {
    return $this->belongsTo(Status_pasien::class, 'status');
  }
  public function poliklinik()
  {
    return $this->belongsTo(Poliklinik::class, 'poliklinik');
  }
  public function dokter()
  {
    return $this->belongsTo(Dokter::class, 'dokter');
  }
  public function pasien()
  {
    return $this->belongsTo(Pasien::class, 'pasien');
  }
}
