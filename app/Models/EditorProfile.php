<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'editor_id',
        'avatar_path',
        'about_me',
        'website_link'
    ];


    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }
}
