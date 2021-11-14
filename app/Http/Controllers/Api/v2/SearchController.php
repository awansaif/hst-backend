<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // search blog
        if (Cache::get('search_blog_' . $request->q)) {
            $blogs = Cache::get('search_blog_' . $request->q);
        } else {
            $blogs = Blog::where('title', 'like', '%' . $request->q . '%')
                ->orWhere('body', 'like', '%' . $request->q . '%')
                ->select('title', 'featured_image', 'slug', 'editor_id', 'created_at', 'id')
                ->with('editor:id,name')
                ->orderBy('id', 'DESC')
                ->paginate(10);
            Cache::put('search_blog_' . $request->q, $blogs, 120);
        }
        return response()->json($blogs);
    }
}
