<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutUsController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status'  => 200,
            'data' => About::select('about_text')->first(),
        ], 200);
    }
}
