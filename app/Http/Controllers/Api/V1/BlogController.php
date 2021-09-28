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
            ->orderBy('views', 'DESC')
            ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at', 'category_id')
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
        $blogs = Blog::query()
            ->select('id', 'title', 'slug', 'featured_image', 'views', 'created_at')
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
        $blog = Blog::query()
            ->with(['category' => fn ($builder) => $builder->select('id', 'title', 'slug')])
            ->with(['editor' => fn ($builder) => $builder->select('id', 'name')])
            ->with(['editor.profile' => fn ($builder) => $builder->select('id', 'avatar_path', 'about_me', 'website_link', 'editor_id')])
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
        $blog = Blog::query()
            ->where('slug', $slug)
            ->select('id', 'slug')
            ->first();
        $comments = BlogComment::query()
            ->orderBy('id', 'DESC')
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

        $blog = Blog::query()
            ->select('id', 'slug')
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
        $blogs = Blog::query()
            ->orderBy('views', 'DESC')
            ->when('created_at' == today(), fn ($builder) => $builder->where('created_at', today()))
            ->select("id", 'slug', 'title', 'featured_image', 'created_at')
            ->take(5)
            ->get();

        return response()->json([
            'status' => 200,
            'data'   => $blogs
        ], 200);
    }
}
