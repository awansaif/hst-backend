<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategory extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required|string||unique:categories,title',
    ];

    public function save()
    {
        $this->validate();

        Category::create([
            'title' => $this->title,
            'slug'  => Str::slug($this->title)
        ]);

        $this->reset(['title']);

        return back()
            ->with('message', 'Category add sccessfully');
    }
    public function render()
    {
        return view('livewire.category.add-category');
    }
}
