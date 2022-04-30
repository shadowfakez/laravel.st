<?php

namespace App\Providers;

use App\Services\FileHandle\FileDelete;
use Illuminate\Support\ServiceProvider;

class FileDeleteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('FileDelete', function () {
            return new FileDelete();
        });
    }
}

