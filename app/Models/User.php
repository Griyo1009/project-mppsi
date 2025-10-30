<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'NIK', 'nama_lengkap', 'username', 'password',
        'status_akun', 'role', 'foto_profil', 'email'
    ];

    protected $hidden = ['password'];

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
