<?php

namespace App\Services;

use App\Contracts\Record;

/**
 * Class MysqlStorageService
 * @package App\Services
 */
class MysqlStorageService extends StorageService
{
    /**
     * @param Record $record
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
