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
        'judul_berita',
        'users_id',
        'prodi_table_id',
        'body',
        'image',
        'slug',
    ];

    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }
}
