<?php

namespace App\Exceptions;

use Exception;

/**
 * Class InvalidCustomerException
 * @package App\Exceptions
 */
class InvalidCustomerException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response($this->getMessage(), 400);
    }
}
