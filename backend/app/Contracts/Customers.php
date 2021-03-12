<?php

namespace App\Contracts;

/**
 * Contract Customers
 * @package App\Http\Contracts
 */
interface Customers
{
    /**
     * @return mixed
     */
    public function storage();

    /**
     * @return mixed
     */
    public function showAll();
}
