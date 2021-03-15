<?php

namespace App\Services;

use App\Contracts\Record;
use App\Models\AbstractRecord;
use App\Models\CacheCustomer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

/**
 * Class CacheStorageService
 * @package App\Services
 */
class CacheStorageService extends StorageService
{
    const SERVICE_NAME = 'cacheStorage';

    /**
     * @var AbstractRecord
     */
    protected $classModel = CacheCustomer::class;

    /**
     * JsonStorageService constructor.
     */
    public function __construct()
    {
        $this->filePath = Config::get('reference_book.storage_path.cache', 'database.json');

        $this->data = $this->getData();
    }

    /**
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function getData(): array
    {
        return $this->getRawData();
    }

    /**
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function getRawData(): array
    {
        $cache = Cache::store(CacheCustomer::getCacheDriver())->get($this->filePath, []);

        if (is_array($cache)) {
            return $cache;
        }

        return json_decode($cache, true);
    }

    /**
     * @param Record $record
     * @return bool
     * @throws \App\Exceptions\InvalidCustomerException
     */
    public function save(Record $record): bool
    {
        /**
         * @var AbstractRecord $classModel
         */
        $classModel = $this->classModel;

        /**
         * @var AbstractRecord $model
         */
        $model = $classModel::create($record->getValues());

        if (!$classModel::validateUniqFullName($model->full_name)) {
            return false;
        }

        $this->data = array_merge($this->data, [$model->getValues()]);
        $saved = Cache::store(CacheCustomer::getCacheDriver())->put($this->filePath, json_encode($this->data));

        return $saved;
    }
}
