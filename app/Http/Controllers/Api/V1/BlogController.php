<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{



    // show latest blogs
    public function latest()
    {
        $blogs = Blog::with(['category' => fn ($builder) => $builder->select('id', 'title', 'slug')])
            ->select('id', 'title', 'slug', 'featured_image', 'views', 'category_id', 'created_at')
            ->withCount('comments')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }

    // featured blogs
    public function featured()
    {
        return response()->json([
            'status'  => 200,
            'data' => Blog::query()
                ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at')
                ->withCount('comments')
                ->where('isFeatured', 1)
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get(),
        ], 200);
    }


    // home page blogs
    public function index()
    {
        $blogs = Blog::with(['category' => fn ($builder) => $builder->select('id', 'title', 'slug')])
            ->withCount('comments')
            ->orderBy('id', 'DESC')
            ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at', 'category_id')
            ->take(10)
            ->get();

        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }



    // fetch recommended blogs based on views
    public function recommended()
    {
        $blogs = Blog::query()
            ->with(['category' => fn ($builder) => $builder->select('id', 'title', 'slug')])
            ->withCount('comments')
            ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at', 'category_id')
            ->orderBy('views', 'DESC')
            ->take(6)
            ->get();

        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }


    // fetch all blogs
    public function all()
    {
        $blogs = Blog::with('category')
            ->withCount('comments')
            ->orderBy('id', 'DESC')
            ->get();
        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }

    // show signle blog
    public function show($slug)
    {
        $blog = Blog::with('category', 'editor', 'profile')
            ->withCount('comments')
            ->where('slug', $slug)
            ->first();
        if (!$blog) {
            return response()->json([
                'status' => 404,
                'message'   => "Blog Not Found",
            ], 404);
        }

        $blog->update([
            'views' => $blog->views + 1
        ]);

        $data = [
            'blog' => $blog,
            'previous' => Blog::where('id', '<', $blog->id)
                ->select('slug', 'title')
                ->first(),

            'next' => Blog::where('id', '>', $blog->id)
                ->select('slug', 'title')
                ->first()
        ];

        return response()->json([
            'status' => 200,
            'data'   => $data,
        ], 200);
    }

    // show comments of blog
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


    // save comment
    public function save_comment($slug, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $blog = Blog::with('category')
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

    // show trending blogs
    public function trending()
    {
        $blogs = Blog::orderBy('views', 'DESC')
            ->whereDate('created_at', today())
            ->select("id", 'slug', 'title', 'featured_image', 'created_at')
            ->take(5)
            ->get();

        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
}
