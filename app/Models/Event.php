<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Event extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'event_table';

    protected $fillable = [
        'judul_event',
        'slug',
        'users_id', 
        'image', 
        'body', 
        'lokasi'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
