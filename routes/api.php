<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('categories', [CategoryController::class, 'index']);
Route::post('subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|unique:subscribers,email|email',
    ]);
    Subscriber::create([
        'email' => $request->email,
    ]);

    return response()->json([
        'status'  => 200,
        'message' => 'Thanks for subscribe on our site',
    ], 200);
});
