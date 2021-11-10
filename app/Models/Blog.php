<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;
use app\traits\CacheClear;

class Blog extends Model
{
    use HasFactory, CacheClear;

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
        return $this->belongsTo(EditorProfile::class, 'editor_id', 'editor_id');
    }
    public function editor()
    {
        return $this->belongsTo(Editor::class, 'editor_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }


    // Forget cache key on storing or updating
    public static function boot()
    {
        Parent::boot();
        static::saved(function () {
            Cache::forget('categories');
        });
    }
}
