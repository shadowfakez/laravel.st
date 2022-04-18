<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Comment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Comment';
    }

}
