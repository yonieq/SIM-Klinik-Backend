<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokterpoli extends Model
{
    use HasFactory;
    protected $table = "dokterpoli";
    protected $primaryKey ="dokter_id";
    protected $fillable =[
        'dokter_id',
        'poli_id'
    ];
    public function dokter()
    {
        return $this->belongsTo(User::class,'dokter_id');
    }
    public function poli()
    {
        return $this->belongsTo(Poliklinik::class,'poli_id');
    }

}
