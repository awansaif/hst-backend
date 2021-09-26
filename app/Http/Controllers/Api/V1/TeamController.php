<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Member;

class TeamController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status'  => 200,
            'data' => Member::query()
                ->select('id', 'name', 'avatar_path')
                ->get(),
        ], 200);
    }
}
