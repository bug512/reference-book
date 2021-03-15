<?php

namespace App\Services;

use App\Contracts\Record;
use App\Contracts\Storage;
use Illuminate\Support\Collection;

abstract class StorageService implements Storage
{
    const SERVICE_NAME = 'storage';

    const DEFAULT_SERVICE_STORAGE = 'Mysql';

    /**
     * @var string
     */
    protected $filePath = '';

    /**
     * @var string
     */
    protected $realPath = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Saved service method
     *
     * @param \App\Contracts\Record $record
     * @return bool|void
     */
    public function save(Record $record): bool
    {
        $saved = false;

        return $saved;
    }

    /**
     * @return Collection AbstractRecord
     */
    public static function getAll(): Collection
    {
        $collection = new Collection();
        $service = new static();
        foreach ($service->data as $item) {
            $classModel = $service->classModel;
            if (!is_array($item)) {
                $model = $classModel::create($service->data);
                $collection->add($model);
                break;
            }
            $model = $classModel::create($item);
            $collection->add($model);
        }
        return $collection;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    protected function getData(): array
    {
        $array = [];

        if (file_exists($this->realPath)) {
            $array = $this->getRawData();
        }

        return $array;
    }

    /**
     * @return array
     */
    abstract protected function getRawData(): array;
}
