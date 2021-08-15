<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
            ->select('title', 'slug')
            ->orderBy('title', 'ASC')
            ->get();
        if (!count($categories) > 0) {
            return response()->json([
                'status'  => 403,
                'message' => 'Record Not found',
            ], 403);
        }
        return response()->json([
            'status' => 200,
            'data' => $categories,
        ], 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
