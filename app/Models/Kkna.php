<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Kkna extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'kkna_table';

    protected $fillable = [
        'sub judul', 
        'judul', 
        'image', 
        'deskripsi', 
        'tanggal'
    ];
}
