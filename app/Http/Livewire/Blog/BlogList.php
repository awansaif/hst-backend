<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogList extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::with('category', 'editor')->orderBy('id', 'DESC')->get();
    }


    public function remove($id)
    {
        $blog = Blog::findorFail($id);
        $blog->delete();

        unlink('storage/' . $blog->featured_image);

        $this->blogs = Blog::with('category', 'editor')->orderBy('id', 'DESC')->get();

        session()->flash('message', 'Blog removed successfully');
    }

    public function render()
    {
        return view('livewire.blog.blog-list');
    }
}
