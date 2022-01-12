<?php

namespace App\Providers;

use App\Services\History\History;
use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('history', function () {
            return new History();
        });
    }
}
