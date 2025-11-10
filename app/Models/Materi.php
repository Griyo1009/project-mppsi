<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_materi';
    protected $table = 'materi';
    protected $fillable = [
        'judul_materi', 'deskripsi', 'tipe_materi', 
        'file_path', 'link_url', 'tgl_up', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_materi');
    }
}