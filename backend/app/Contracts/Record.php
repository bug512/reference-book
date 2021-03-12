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
     * @return bool
     */
    public function setValues(array $values): bool;
}
