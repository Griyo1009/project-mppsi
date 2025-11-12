<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'NIK',
        'nama_lengkap',
        'username',
        'password',
        'email',
        'status_akun',
        'role',
        'foto_profil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getFotoProfilAttribute($value)
    {
        return $value ?? 'default.jpg';
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_user');
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'id_user');
    }
}
