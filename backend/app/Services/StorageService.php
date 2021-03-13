<?php

namespace App\Services;

use App\Contracts\Record;
use App\Contracts\Storage;

abstract class StorageService implements Storage
{
    /**
     * @param \App\Contracts\Record $record
     * @return bool|void
     */
    public function save(Record $record): bool
    {
        // TODO: Implement save() method.
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        // TODO: Implement showAll() method.
    }
}
