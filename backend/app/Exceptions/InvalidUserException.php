<?php

namespace App\Exceptions;

use Exception;

/**
 * Class InvalidUserException
 * @package App\Exceptions
 */
class InvalidUserException extends Exception
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function render()
    {
        return response($this->getMessage(), 400);
    }
}
