<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;

trait CacheClear
{
    protected static function boot()
    {
        parent::boot();
        static::updated(function () {
            Artisan::call('cache:clear');
        });
        static::created(function () {
            Artisan::call('cache:clear');
        });
        static::saved(function () {
            Artisan::call('cache:clear');
        });
    }
}
