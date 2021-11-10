<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug'
    ];

    // category relationship with blogs one to many
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class)->select('category_id', 'title', 'featured_image', 'slug', 'editor_id', 'created_at', 'id')
            ->orderBy('id', 'DESC');
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
