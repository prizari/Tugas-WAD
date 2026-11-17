<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'pengelolaan_event';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'judul_event',
        'deskripsi',
        'kategori',
        'silabus',
        'durasi_sesi',
    ];
}
