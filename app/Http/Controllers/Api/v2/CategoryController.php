<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Cache::has($request->slug)) {
            $category =  Cache::get($request->slug);
        } else {
            $category = Cache::remember($request->slug, 86400, function () use ($request) {
                return Category::query()
                    ->with('blogs:category_id,title,slug,featured_image,created_at,editor_id', 'blogs.editor:id,name')
                    ->where('slug', $request->slug)
                    ->select('id', 'title', 'slug')
                    ->get();
            });
        }
        return response()->json([
            'data' => $category
        ]);
    }
}
