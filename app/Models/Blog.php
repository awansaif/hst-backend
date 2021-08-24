<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'featured_image',
        'category_id',
        'featured',
        'body',
        'isFeatured'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function view()
    {
        return $this->belongsTo(BlogView::class, 'id', 'blog_id');
    }

    protected $casts = [
        'created_at' => "datetime:M d, Y",
    ];
}
