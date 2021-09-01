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
        'views',
        'isFeatured'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function profile()
    {
        return $this->hasOne(EditorProfile::class, 'id', 'editor_id');
    }
    public function editor()
    {
        return $this->belongsTo(Editor::class, 'editor_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }


    protected $casts = [
        'created_at' => "datetime:M d, Y",
    ];
}
