<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileHandle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'FileHandle';
    }

}
