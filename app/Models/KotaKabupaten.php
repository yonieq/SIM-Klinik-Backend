<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    use HasFactory;
    protected $table = 'kota_kabupaten';
    protected $fillable = [
        'name',
    ];
    public function dokterPoli()
    {
        return $this->hasMany(User::class, 'tempat_lahir');
    }
}
