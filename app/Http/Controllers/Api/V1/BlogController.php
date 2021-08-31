<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogView;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('category', 'view')
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
    public function all()
    {
        $blogs = Blog::with('category', 'view')
            ->orderBy('id', 'DESC')
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }

    public function show($slug)
    {
        $blog = Blog::with('category', 'view', 'editor', 'profile')
            ->where('slug', $slug)
            ->first();
        if (!$blog) {
            return response()->json([
                'status' => 404,
                'message'   => "Blog Not Found",
            ], 404);
        }
        $views = BlogView::where('blog_id', $blog->id)
            ->first();
        $data = [
            'blog' => $blog,
            'previous' => Blog::where('id', '<', $blog->id)
                ->select('slug', 'title')
                ->first(),

            // get next Blog id
            'next' => Blog::where('id', '>', $blog->id)
                ->select('slug', 'title')
                ->first()
        ];
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
            'data'   => $data,
        ], 200);
    }

    public function comment($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->first();
        $comments = BlogComment::orderBy('id', 'DESC')
            ->where('blog_id', $blog->id)
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $comments
        ]);
    }


    public function save_comment($slug, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $blog = Blog::with('category', 'view')
            ->where('slug', $slug)
            ->first();
        $comment = BlogComment::create([
            'blog_id' => $blog->id,
            'name'   => $request->name,
            'email' => $request->email,
            'text' => $request->message
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Comment added successfully',
            'comment' => $comment
        ]);
    }
    public function trending()
    {
        $blogs = Blog::with(['category', 'view' => function ($query) {
            $query->orderBy('views', 'DESC');
        }])
            ->orderBy('id', 'DESC')
            ->whereDate('created_at', today())
            ->select("id", 'slug', 'title', 'featured_image', 'created_at')
            ->take(5)
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
    public function recommended()
    {
        $order = "DESC";
        $blogs = Blog::with(['category',  'view' => function ($q) {
            $q->orderBy('views', 'ASC');
        }])
            ->take(6)
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }

    public function latest()
    {
        $blogs = Blog::with('category', 'view')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
}
