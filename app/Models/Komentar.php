<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_komentar';

    protected $fillable = ['tgl_komen', 'isi_komen', 'id_user', 'id_materi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }
}
