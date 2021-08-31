<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'editor_id',
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
    public function profile()
    {
        return $this->hasOne(EditorProfile::class, 'editor_id', 'editor_id');
    }
    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    protected $casts = [
        'created_at' => "datetime:M d, Y",
    ];
}
