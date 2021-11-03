<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam_medik_obat extends Model
{
  use HasFactory;

  protected $fillable = [
    'obat',
    'dosis',
    'aturan_minum',
    'jumlah',
  ];

  public function rekam_medik()
  {
    return $this->belongsTo(Rekam_medik::class, "rekam_medik");
  }
  public function obat()
  {
    return $this->belongsTo(Obat::class, "obat");
  }
  public function obat_()
  {
    return $this->belongsTo(Obat::class, "obat");
  }
}
