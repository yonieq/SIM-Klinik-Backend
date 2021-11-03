<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_pasien extends Model
{
    use HasFactory;
    protected $table = "status_pasien";
    protected $fillable= [
        'status'
    ];
    
    public function antrian()
    {
        return $this->hasOne(Antrian::class,'status');
    }
    public function rekam_medik()
    {
        return $this->hasOne(Rekam_medik::class,'status_pasien');
    }
    public function pasien(){
		return $this->belongsTo(Pasien::class,"pasien");
	}
    public function transaksi()
    {
        return $this->hasOne(Transaksi_pasien::class,'status_pasien');
    }
    public function rujukan()
    {
        return $this->hasOne(Rujukan_pasien::class,'status_pasien');
    }
}
