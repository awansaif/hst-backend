<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SiteProfile;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function __invoke()
    {
        if (Cache::has('profile')) {
            $profile =  Cache::get('profile');
        } else {
            $profile = Cache::remember('profile', 86400, fn () => SiteProfile::first());
        }
        return response()->json([
            'status' => 200,
            'data' => $profile
        ], 200);
    }
}
