<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogView;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('category', 'view')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }


    public function show($slug)
    {
        $blog = Blog::with('category', 'view')->where('slug', $slug)->firstorfail();
        $views = BlogView::where('blog_id', $blog->id)->first();

        $previous = Blog::where('id', '<', $blog->id)->max('id');

        // get next Blog id
        $next = Blog::where('id', '>', $blog->id)->min('id');
        if (!$views) {
            BlogView::create([
                'blog_id' => $blog->id,
                'views' => 0
            ]);
        }
        $views->update([
            'views' => $views->views + 1
        ]);
        return response()->json([
            'status' => 200,
            'data'   => $blog,
            'previous' => $previous,
            'next' => $next
        ], 200);
    }

    public function trending()
    {
        $blogs = Blog::with('category', 'view')
            ->orderBy('id', 'DESC')
            ->whereDate('created_at', today())
            ->get()
            ->sortByDesc('view.views');
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
    public function recommended()
    {
        $blogs = Blog::with('category', 'view')
            ->orderBy('id', 'DESC')
            ->get()
            ->sortByDesc('view.views');
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
}
