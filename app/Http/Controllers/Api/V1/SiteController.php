<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SiteProfile;

class SiteController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status' => 200,
            'data' => SiteProfile::first()
        ], 200);
    }
}
