<?php

namespace App\Contracts;

/**
 * Contract Record
 * @package App\Http\Contracts
 */
interface Record
{
    /**
     * @return array
     */
    public function getValues(): array;

    /**
     * @param array $attributes
     * @return mixed
     */
    public function setValues(array $values);
}
