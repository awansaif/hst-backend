<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategory extends Component
{
    public $title;
    public $categoryId;

    // protected $rules = [
    //     'title' => 'required|string|unique:categories,title,' . $this->id,
    // ];

    public function mount($category)
    {
        $this->title = $category->title;
        $this->categoryId = $category->id;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|unique:categories,title,' . $this->categoryId
        ]);

        Category::find($this->categoryId)->update([
            'title' => $this->title,
            'slug'  => Str::slug($this->title)
        ]);

        return back()
            ->with('message', 'Category updated sccessfully');
    }

    public function render()
    {
        return view('livewire.category.edit-category');
    }
}
