<?php

namespace Lumki\Lumki\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lumki\Lumki\Lumki
 */
class Lumki extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lumki';
    }
}
