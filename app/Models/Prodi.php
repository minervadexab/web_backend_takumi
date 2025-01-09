<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    // Tentukan nama tabel (opsional jika nama tabel sudah sesuai dengan konvensi Laravel)
    protected $table = 'prodi_table';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'prodi',
        'deskripsi',
        'slug',
    ];
}
