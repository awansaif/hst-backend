<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use App\Traits\CacheClear;

class Category extends Model
{
    use HasFactory, CacheClear;


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
}
