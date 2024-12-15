<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class Potm extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'potm_table';

    protected $fillable = [
        'Nama Potm',
        'deskripsi',
        'image',
        'gelar',
    ];
}
