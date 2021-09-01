<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    // show editors
    public function editors()
    {
        return response()->json([
            'status' => 200,
            'data'  => Editor::with(['profile' => function ($q) {
                $q->select('editor_id', 'avatar_path');
            }])
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
            'data'  => Blog::where('editor_id', $slug)
                ->withCount('comments')
                ->orderBy('id', 'DESC')
                ->get()
        ], 200);
    }
}
