<?php

namespace App\Models;

use App\Models\User;
use App\Models\Komentar;
use App\Models\MateriFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_materi';
    protected $table = 'materis';
    protected $fillable = [
        'id_user',
        'judul_materi',
        'deskripsi',
        'tgl_up'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_materi');
    }

    public function files()
    {
        return $this->hasMany(MateriFile::class, 'id_materi');
    }
}