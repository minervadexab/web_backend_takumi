<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class article extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'aricle_table';

    protected $fillable = [
        'judul_article', 
        'body', 
        'image'
    ];

}
