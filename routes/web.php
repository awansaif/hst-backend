<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Editor\BlogController as EditorBlogController;
use App\Http\Controllers\Editor\EditorController as EditorEditorController;
use App\Http\Controllers\SiteProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('editor')
    ->as('editor.')
    ->group(
        function () {
            Route::middleware(['guest:editor'])->group(function () {
                Route::get('/', [EditorEditorController::class, 'showLoginForm'])->name('showLoginForm');
                Route::post('/', [EditorEditorController::class, 'login'])->name('login');
            });

            Route::middleware(['auth:editor'])->group(
                function () {
                    Route::get('dashboard', [EditorEditorController::class, 'dashboard'])->name('dashboard');

                    // blogs
                    Route::resource('blogs', EditorBlogController::class);

                    Route::get('profile', [EditorEditorController::class, 'profile'])->name('profile');
                    Route::post('profile', [EditorEditorController::class, 'updateProfile'])->name('updateProfile');
                    Route::get('setting', [EditorEditorController::class, 'setting'])->name('setting');
                    Route::get('logout', [EditorEditorController::class, 'logout'])->name('logout');
                }
            );
        }
    );

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

            // members
            Route::resource('settings', SettingController::class);

            // siteprofile
            Route::resource('contactus', ContactUsController::class);

            // editor
            Route::resource('editors', EditorController::class);

            // siteprofile
            Route::resource('siteprofiles', SiteProfileController::class);

            // blogs
            Route::resource('blogs', BlogController::class);

            // email subscribers
            Route::view('subscribers', 'admin.pages.subscriber.index')->name('subscribers');

            Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        });
    });
