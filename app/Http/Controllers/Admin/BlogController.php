<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogView;
use App\Models\Category;
use App\Models\Editor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index(): View
    {
        return view('admin.pages.blog.index');
    }


    public function create(): View
    {
        return view('admin.pages.blog.create', [
            'categories' => Category::orderBy('title', 'ASC')->get(),
            'editors'    => Editor::orderBy('name', 'ASC')->get()
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:blogs,title',
            'featured_image' => 'required|image',
            'category' => 'required|exists:categories,id',
            'editor' => 'required|exists:editors,id',
            'featured' => 'required|boolean',
            'body'    => 'required'
        ]);

        $blog = Blog::create([
            'editor_id' => $request->editor,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'featured_image' => $request->featured_image->store('images', 'public'),
            'category_id' => $request->category,
            'body' => $request->body,
            'isFeatured' => $request->featured
        ]);
        BlogView::create([
            'blog_id' => $blog->id,
            'views' => 0
        ]);
        return back()
            ->with('message', 'Blog added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog): View
    {
        return view('admin.pages.blog.edit', [
            'blog' => $blog,
            'categories' => Category::orderBy('title', 'ASC')->get(),
            'editors'    => Editor::orderBy('name', 'ASC')->get()
        ]);
    }


    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $blog->id,
            'featured_image' => 'nullable|image',
            'category' => 'required|exists:categories,id',
            'editor' => 'required|exists:editors,id',
            'featured' => 'required|boolean',
            'body'    => 'required'
        ]);

        $blog->update([
            'editor_id' => $request->editor,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'featured_image' => $request->featured_image ? $request->featured_image->store('images', 'public') : $blog->featured_image,
            'category_id' => $request->category,
            'body' => $request->body,
            'isFeatured' => $request->featured
        ]);

        return back()
            ->with('message', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
