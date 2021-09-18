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
}
