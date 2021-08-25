<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'views',
    ];


    // protected $hidden = [
    //     'id', 'created_at', 'updated_at'
    // ];
}
