<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam_medik_tindakan extends Model
{
  use HasFactory;

  protected $fillable = [
    'tindakan',
  ];
  public function rekam_medik()
  {
    return $this->belongsTo(Rekam_medik::class, "rekam_medik");
  }
  public function tindakan()
  {
    return $this->belongsTo(Tindakan::class, "tindakan");
  }
  public function tindakan_()
  {
    return $this->belongsTo(Tindakan::class, "tindakan");
  }
}
