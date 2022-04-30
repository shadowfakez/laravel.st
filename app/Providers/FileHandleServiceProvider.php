<?php

namespace App\Providers;

use App\Services\FileHandle\FileHandle;
use Illuminate\Support\ServiceProvider;

class FileHandleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('FileHandle', function () {
            return new FileHandle();
        });
    }
}

