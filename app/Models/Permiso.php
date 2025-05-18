<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permiso extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permiso_role', 'permiso_id', 'role_id')
            ->withTimestamps();
    }
}
