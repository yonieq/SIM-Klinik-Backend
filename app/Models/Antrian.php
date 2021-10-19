<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
  use HasFactory;
  protected $table = "antrian";
  protected $with = ['status_pasien'];
  protected $fillable = [
    'no_antri',
    'nik',
    'tgl_periksa',
    'dokter',
    'jam',
    'jadwal_id',
    'status'
  ];
  public function status_()
  {
    return $this->belongsTo(Status_pasien::class, 'status');
  }
  public function pasien()
  {
    return $this->belongsTo(Pasien::class, 'nik');
  }
}
