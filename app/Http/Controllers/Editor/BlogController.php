<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogView;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{

    public function index()
    {
        return view('editor.pages.blog.index');
    }


    public function create()
    {
        return view('editor.pages.blog.create', [
            'categories' => Category::orderBy('title', 'ASC')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title',
            'featured_image' => 'required|image',
            'category' => 'required|exists:categories,id',
            'body'    => 'required'
        ]);

        $blog = Blog::create([
            'editor_id' => auth()->guard('editor')->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'featured_image' => $request->featured_image->store('images', 'public'),
            'category_id' => $request->category,
            'body' => $request->body,
            'isFeatured' => 0
        ]);
        return back()
            ->with('message', 'Blog added successfully');
    }


    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        return view('editor.pages.blog.edit', [
            'blog' => $blog,
            'categories' => Category::orderBy('title', 'ASC')->get()
        ]);
    }


    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $blog->id,
            'featured_image' => 'nullable|image',
            'category' => 'required|exists:categories,id',
            'body'    => 'required'
        ]);

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'featured_image' => $request->featured_image ? $request->featured_image->store('images', 'public') : $blog->featured_image,
            'category_id' => $request->category,
            'body' => $request->body,
        ]);

        return back()
            ->with('message', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
