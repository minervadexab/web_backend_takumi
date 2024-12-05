<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SettingRole extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "setting_roles";
    protected $fillable = ["users_id", "roles_id"];


    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}
