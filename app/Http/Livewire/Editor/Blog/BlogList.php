<?php

namespace App\Http\Livewire\Editor\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogList extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::with('category')
            ->orderBy('id', 'DESC')
            ->where('editor_id', auth()->guard('editor')->user()->id)
            ->get();
    }


    public function remove($id)
    {
        $blog = Blog::findorFail($id);
        $blog->delete();

        unlink('storage/' . $blog->featured_image);

        $this->blogs = Blog::with('category')
            ->orderBy('id', 'DESC')
            ->where('editor_id', auth()->guard('editor')->user()->id)
            ->get();

        session()->flash('message', 'Blog removed successfully');
    }
    public function render()
    {
        return view('livewire.editor.blog.blog-list');
    }
}
