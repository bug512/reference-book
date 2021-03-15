<?php

namespace App\Services;

use App\Contracts\Record;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use App\Models\XlsxCustomer;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class XslxStorageService
 * @package App\Services
 */
class XlsxStorageService extends StorageService
{
    const SERVICE_NAME = 'xlsxStorage';

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
     * @var AbstractRecord
     */
    protected $classModel = XlsxCustomer::class;

    /**
     * JsonStorageService constructor.
     */
    public function __construct()
    {
        $this->filePath = Config::get('reference_book.storage_path.xlsx', 'database.json');

        $this->realPath = storage_path('app/' . $this->filePath);

        $this->data = $this->getData();
    }

    /**
     * @return array
     */
    protected function getRawData(): array
    {
        $data = Excel::toArray(new CustomerImport(), $this->filePath);
        return count($data) > 0 ? $data[0] : $data;
    }

    /**
     * @param Record $record
     * @return bool|void
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

        return Excel::store(
            new CustomerExport($this->data),
            $this->filePath
        );
    }
}
