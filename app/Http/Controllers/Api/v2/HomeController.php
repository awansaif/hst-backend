<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function __invoke()
    {
        if (Cache::has('categories')) {
            $categories = Cache::get('categories');
        } else {
            $categories = Cache::remember('categories', 86400, function () {
                return Category::query()
                    ->with('blogs:category_id,title,featured_image,slug,editor_id,created_at', 'blogs.editor:id,name')
                    ->select('id', 'title', 'slug')
                    ->get();
            });
        }

        return response()->json([
            'data' =>   $categories
        ]);
    }
}
