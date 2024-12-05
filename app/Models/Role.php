<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'roles';

    protected $fillable = ['name_role'];
}

