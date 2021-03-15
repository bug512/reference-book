<?php

namespace App\Contracts;
use Illuminate\Support\Collection;

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
    public static function getAll(): Collection;

    /**
     * @return array
     */
    public function toArray(): array ;
}
