<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumans';
    protected $primaryKey = 'id_pengumuman';
    public $timestamps = true;

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'tgl_pengumuman',
        'id_user',
        'tgl_pelaksanaan',
        'lokasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
