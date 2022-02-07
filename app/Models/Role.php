<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Relationship
    public function users()
    {
        return $this->hasOne(User::class,'user_id','id');
    }
}
