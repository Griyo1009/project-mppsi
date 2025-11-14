<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MateriFile extends Model
{
     use HasFactory;

    protected $table = 'materi_files';
    protected $primaryKey = 'id_file';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_materi',
        'tipe_file',
        'file_path',
        'link_url',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi',);
    }
}
