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
                    ->with('blogs', 'blogs.editor:id,name')
                    ->select('id', 'title', 'slug')
                    ->get()->map(function ($query) {
                        $query->setRelation('blogs', $query->blogs->take(4));
                        return $query;
                    });
            });
        }

        return response()->json([
            'data' => $categories
        ]);
    }
}
