<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class NewsListerController extends Controller
{
    public function __invoke()
    {
        request()->validate([
            'email' => 'required|unique:subscribers,email|email',
        ]);
        Subscriber::create([
            'email' => request('email'),
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Thanks for subscribe on our site',
        ], 200);
    }
}
