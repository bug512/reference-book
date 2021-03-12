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
    public function save(Record $record)
    {
        // TODO: Implement save() method.
    }

    public function getAll()
    {
        // TODO: Implement showAll() method.
    }
}
