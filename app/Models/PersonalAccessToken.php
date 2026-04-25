<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    protected $fillable = [
        "token",
        "is_valid",
        "user_id", 
        "expires_at"
    ];
}
