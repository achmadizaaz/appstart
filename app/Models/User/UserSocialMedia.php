<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'facebook', 'instagram', 'twitter', 'youtube', 'other'
    ];
}
