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
        'judul_kegiatan', 
        'users_id',
        'jenis_akademik_id',
        'image', 
        'body', 
        'slug'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

}