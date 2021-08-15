<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class BlogCategories extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::orderBy('title', 'ASC')->get();
    }

    // remove category
    public function remove($id)
    {
        Category::find($id)->delete();
        $this->categories = Category::orderBy('title', 'ASC')->get();
        return back()
            ->with('message', 'Category removed sccessfully');
    }

    public function render()
    {
        return view('livewire.blog-categories');
    }
}
