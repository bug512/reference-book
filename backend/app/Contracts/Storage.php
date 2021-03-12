<?php

namespace App\Contracts;

/**
 * Contract Storage
 * @package App\Http\Contracts
 */
interface Storage
{
    /**
     * @param Record $record
     * @return bool
     */
    public function save(Record $record): bool;

    /**
     * @return mixed
     */
    public function getAll();
}
