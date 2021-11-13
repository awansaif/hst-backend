<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function __invoke()
    {
        if (Cache::has('categories') && Cache::has('featured')) {
            $categories = Cache::get('categories');
            $featured = Cache::get('featured');
        } else {
            $categories = Cache::remember('categories', 86400, function () {
                return Category::query()
                    ->with('blogs', 'blogs.editor:id,name')
                    ->select('id', 'title', 'slug')
                    ->get()->map(function ($query) {
                        $query->setRelation('blogs', $query->blogs->take(4));
                        return $query;
                    });
            });
            $featured = Cache::remember('featured', 86400, function () {
                return Blog::query()
                    ->select('category_id', 'title', 'featured_image', 'slug', 'editor_id', 'created_at', 'id', 'isFeatured')
                    ->with('editor:id,name')
                    ->orderBy('id', 'DESC')
                    ->where('isFeatured', 1)
                    ->get();
            });
        }

        return response()->json([
            'data' => $categories,
            'featured' => $featured
        ]);
    }
}
