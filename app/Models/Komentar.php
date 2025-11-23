<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Komentar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_komentar';
    protected $table = 'komentars';
    protected $fillable = ['tgl_komen', 'isi_komen', 'id_user', 'id_materi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
