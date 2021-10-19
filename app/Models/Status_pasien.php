<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_pasien extends Model
{
    use HasFactory;
    protected $table = "status_pasien";
    protected $fillable=[
        'pasien_id',
        'status',
        'tanggal',
        'no_RM'
    ];
    public function antrian()
    {
        return $this->hasOne(Antrian::class,'status');
    }
    public function pasien(){
		return $this->belongsTo(Pasien::class,"pasien_id");
	}
}
