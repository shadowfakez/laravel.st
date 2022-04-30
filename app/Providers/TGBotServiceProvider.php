<?php

namespace App\Providers;

use App\Services\TGBot\TGBot;
use Illuminate\Support\ServiceProvider;

class TGBotServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('TGBot', function () {
            return new TGBot();
        });
    }
}
