<?php

namespace App\Providers;

use App\Services\Comment\Comment;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('Comment', function () {
            return new Comment();
        });
    }
}

