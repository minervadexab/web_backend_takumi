<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class projectandresearch extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'projectandresearch_table';

    protected $fillable = [
        'judul',
        'sub judul',
        'image',
        'deskripsi',
        'tanggal',
    ];
}
