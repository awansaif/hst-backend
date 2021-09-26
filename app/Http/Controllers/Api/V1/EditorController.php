<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Editor;

class EditorController extends Controller
{
    // show editors
    public function editors()
    {
        return response()->json([
            'status' => 200,
            'data'  => Editor::query()
                ->with(['profile' => fn ($builder) => $builder->select('editor_id', 'avatar_path')])
                ->select('id', 'name', 'status')
                ->orderBy('name', 'ASC')
                ->where('status', 1)
                ->get()
        ], 200);
    }


    public function blogs($slug)
    {
        return response()->json([
            'status' => 200,
            'data'  => Blog::query()
                ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at', 'editor_id')
                ->where('editor_id', $slug)
                ->withCount('comments')
                ->orderBy('id', 'DESC')
                ->get()
        ], 200);
    }
}
