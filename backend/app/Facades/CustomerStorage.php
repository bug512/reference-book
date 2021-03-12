<?php

namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * Class CustomerStorage
 * @package App\Facades
 */
class CustomerStorage extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'customerStorage';
    }
}
