<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // search blog
        $blogs = Blog::where('title', 'like', '%' . $request->q . '%')
            ->orWhere('body', 'like', '%' . $request->q . '%')
            ->paginate(10);
        return response()->json($blogs);
    }
}
