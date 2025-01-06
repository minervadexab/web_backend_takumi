<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAkademik extends Model
{
    protected $table = 'jenis_akademik';

    protected $fillable = [
        'jenis_akademik',
        'deskripsi',
        'slug',
    ];
}
