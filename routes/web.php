<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\MemberController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::middleware(['guest:admin'])->group(function () {
            Route::get('/', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
            Route::post('/', [AdminController::class, 'login'])->name('login');
        });

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // categories
            Route::resource('categories', BlogCategoryController::class);

            // about page
            Route::resource('abouts', AboutController::class);

            // members
            Route::resource('members', MemberController::class);

            // email subscribers
            Route::view('subscribers', 'admin.pages.subscriber.index')->name('subscribers');

            Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        });
    });
