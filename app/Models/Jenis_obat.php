<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_obat extends Model
{
    use HasFactory;
    protected $table = 'jenis_obat';
    protected $fillable = [
        'name',
];
}
