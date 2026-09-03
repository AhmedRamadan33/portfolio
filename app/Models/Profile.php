<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'tagline',
        'bio',
        'avatar_path',
        'cv_path',
        'email',
        'phone',
        'location',
        'github_url',
        'linkedin_url',
        'twitter_url',
        'whatsapp_url',
    ];
}
