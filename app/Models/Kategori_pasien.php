<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_pasien extends Model
{
    use HasFactory;
    protected $table= 'kategori_pasien';
    protected $fillable = [
        'name'
    ];
}
