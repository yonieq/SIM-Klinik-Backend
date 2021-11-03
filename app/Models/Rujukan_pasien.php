<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan_pasien extends Model
{
  use HasFactory;

  public function rekam_medik()
  {
    return $this->belongsTo(Rekam_medik::class, "rekam_medik");
  }
  public function status()
  {
    return $this->belongsTo(Status_pasien::class, "status_pasien");
  }
}
