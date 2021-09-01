<?php

use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ContactUsController;
use App\Http\Controllers\Api\V1\EditorController;
use App\Http\Controllers\Api\V1\SiteController;
use App\Models\Subscriber;
use App\Models\About;
use App\Models\Member;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/{slug}', [CategoryController::class, 'show']);
Route::get('blogs', [BlogController::class, 'index']);
Route::get('all', [BlogController::class, 'all']);
Route::get('blogs/{slug}', [BlogController::class, 'show']);
Route::get('blog-comment/{slug}', [BlogController::class, 'comment']);
Route::post('blog-comment/{slug}', [BlogController::class, 'save_comment']);
Route::get('trending', [BlogController::class, 'trending']);
Route::get('recommended', [BlogController::class, 'recommended']);
Route::get('latest', [BlogController::class, 'latest']);
Route::post('contact-us', [ContactUsController::class, 'store']);

Route::get('site-profile', [SiteController::class, 'profile']);

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

Route::get('about-us', function () {
    return response()->json([
        'status'  => 200,
        'data' => About::pluck('about_text')->first(),
    ], 200);
});

Route::get('featured', [BlogController::class, 'featured']);

Route::get('team', function () {
    return response()->json([
        'status'  => 200,
        'data' => Member::get(),
    ], 200);
});



// editors list
Route::get('editors', [EditorController::class, 'editors']);
// show signle editor blogs
Route::get('editor/{slug}', [EditorController::class, 'blogs']);
