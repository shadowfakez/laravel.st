<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TGBot extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'TGBot';
    }

}
