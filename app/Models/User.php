<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        // 'email',
        'password',
        'username',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kategori',
        'alamat',
        'no_hp',
        'gaji',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function dokterPoli()
    {
        return $this->hasOne(Dokterpoli::class,'dokter_id');
    }
    public function tempat_lahir_()
    {
        return $this->belongsTo(KotaKabupaten::class,'tempat_lahir');
    }
    public function jadwal_dokter()
    {
        return $this->hasMany(Jadwal_Dokter::class,'dokter_id');
    }
}
