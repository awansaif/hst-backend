<?php

namespace App\Models;

use App\Http\Livewire\SiteProfile\EditProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->belongsTo(EditorProfile::class, 'editor_id', 'id');
    }
    public function editor()
    {
        return $this->hasOne(Editor::class, 'id', 'editor_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }


    protected $casts = [
        'created_at' => "datetime:M d, Y",
    ];
}
