<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokterpoli extends Model
{
    use HasFactory;
    protected $table = "dokterpoli";
    protected $fillable =[
        'dokter_id',
        'poli_id'
    ];
}
