<?php

namespace App\Services;

use App\Contracts\Record;
use App\Exceptions\StorageServiceException;
use App\Models\AbstractRecord;
use App\Models\JsonCustomer;
use Illuminate\Support\Facades\Config;

/**
 * Class JsonStorageService
 * @package App\Services
 */
class JsonStorageService extends StorageService
{
    const SERVICE_NAME = 'jsonStorage';

    /**
     * @var string
     */
    protected $filePath = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var AbstractRecord
     */
    protected $classModel = JsonCustomer::class;

    /**
     * JsonStorageService constructor.
     */
    public function __construct()
    {
        $configFile = Config::get('reference_book.storage_path.json', 'database.json');

        $this->filePath = storage_path($configFile);

        $this->realPath = $this->filePath;

        $this->data = $this->getData();
    }

    /**
     * @param Record $record
     * @return bool
     * @throws StorageServiceException
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

        $saved = $this->saveData();

        if (!$saved) {
            throw new StorageServiceException('Error saved data to JSON');
        }

        return $saved;
    }

    /**
     * @return array
     */
    protected function getRawData(): array
    {
        return json_decode(file_get_contents($this->filePath), true);
    }

    /**
     * @return bool
     * @throws StorageServiceException
     */
    protected function saveData(): bool
    {
        try {
            $saved = file_put_contents($this->filePath, json_encode($this->data));
        } catch (\Throwable $e) {
            throw new StorageServiceException($e->getMessage());
        }

        return $saved;
    }


}
