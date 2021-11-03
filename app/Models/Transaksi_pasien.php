<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_pasien extends Model
{
    use HasFactory;
    protected $table ='transaksi_pasien';

    public function pasien(){
		return $this->belongsTo(Pasien::class,"pasien");
	}
    public function status(){
		return $this->belongsTo(Status_pasien::class,"status_pasien");
	}
    public function rekam_medik(){
		return $this->belongsTo(Rekam_medik::class,"rekam_medik");
	}
	public function rm(){
		return $this->belongsTo(Rekam_medik::class,"rekam_medik");
	}
}
