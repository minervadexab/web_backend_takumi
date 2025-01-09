<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAkademik extends Model
{
    use HasFactory;

    protected $table = 'jenis_akademik_table';

    protected $fillable = [
        'jenis_akademik',
        'deskripsi',
        'slug',
    ];
}
