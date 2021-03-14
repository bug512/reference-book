<?php

namespace App\Services;

use App\Contracts\Record;

/**
 * Class JsonStorageService
 * @package App\Services
 */
class JsonStorageService extends StorageService
{
    const SERVICE_NAME = 'jsonStorage';

    /**
     * @param Record $record
     * @return bool
     */
    public function save(Record $record): bool
    {
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        // TODO: Implement showAll() method.
    }
}
