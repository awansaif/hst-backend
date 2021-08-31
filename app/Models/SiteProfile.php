<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
        "city",
        "state",
        "country",
        "address",
        "facebook_link",
        "twitter_link",
        "instagram_link",
        "pinterest_link",
        "messenger_link",
    ];
}
