<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class news extends Model
{
    use HasFactory,HasApiTokens;

    protected $table = 'news_table';

    protected $fillable = [
        'Judul Berita',
        'Deskripsi',
        'image',
    ];
}
