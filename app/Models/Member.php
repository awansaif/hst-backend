<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar_path',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
    ];
}
