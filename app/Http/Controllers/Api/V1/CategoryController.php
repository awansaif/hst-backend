<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
            ->select('title', 'slug')
            ->orderBy('title', 'ASC')
            ->get();

        if (!count($categories) > 0) {
            return response()->json([
                'status'  => 403,
                'message' => 'Record Not found',
            ], 403);
        }
        return response()->json([
            'status' => 200,
            'data' => $categories,
        ], 200);
    }

    // show specific category blogs
    public function show($slug)
    {
        $categoryId = Category::where('slug', $slug)
            ->pluck('id')
            ->first();

        $blogs = Blog::query()
            ->where('category_id', $categoryId)
            ->select('id', 'title', 'slug', 'featured_image', 'category_id', 'views', 'created_at')
            ->withCount('comments')
            ->get();

        return response()->json([
            'status' => 200,
            'data' => $blogs,
        ], 200);
    }
}
