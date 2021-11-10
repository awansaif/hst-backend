<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $blog = Blog::query()
            ->with('editor:id,name')
            ->where('slug', $request->slug)
            ->firstOrFail();
        $blog->increment('views');
        $related = Blog::query()
            ->select('title', 'slug', 'featured_image', 'editor_id', 'created_at')
            ->with('editor:id,name')
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->take(4)
            ->get();
        return response()->json([
            'blog' => $blog,
            'related' => $related
        ]);
    }
}
