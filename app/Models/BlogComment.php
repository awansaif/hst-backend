<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;


    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'text'
    ];

    protected $casts = [
        'created_at' => "datetime:M d, Y h:i:s a",
    ];
}
