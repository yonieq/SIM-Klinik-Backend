<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam_medik extends Model
{
    use HasFactory;
    protected $table = 'rekam_medik';

    public function pasien(){
		return $this->belongsTo(Pasien::class,"pasien");
	}
    public function dokter(){
		return $this->belongsTo(Dokter  ::class,"dokter");
	}
    public function status(){
		return $this->belongsTo(Status_pasien::class,"status_pasien");
	}
    public function rm_tindakan(){
		return $this->hasMany(Rekam_medik_tindakan::class,"rekam_medik");
	}
    public function rm_obat(){
		return $this->hasMany(Rekam_medik_obat::class,"rekam_medik");
	}
	public function transaksi(){
		return $this->hasMany(Transaksi_pasien::class,"rekam_medik");
	}
	public function rujukan(){
		return $this->hasMany(Rujukan_pasien::class,"rekam_medik");
	}
}
