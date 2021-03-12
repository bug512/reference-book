<?php

namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * Class PersonStorage
 * @package App\Facades
 */
class PersonStorage extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'personStorage';
    }
}
