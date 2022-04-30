<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileDelete extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'FileDelete';
    }

}
