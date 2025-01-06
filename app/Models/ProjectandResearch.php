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
        'judul_project',
        'users_id', 
        'image',
        'body',
        'slug',
    ];

    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }
}
