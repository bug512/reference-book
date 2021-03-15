<?php

namespace App\Services;

use App\Contracts\Record;
use App\Exceptions\InvalidCustomerException;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

/**
 * Class MysqlStorageService
 * @package App\Services
 */
class MysqlStorageService extends StorageService
{
    const SERVICE_NAME = 'mysqlStorage';

    /**
     * @var AbstractRecord
     */
    protected $classModel = Customer::class;

    /**
     * @param Record $record
     * @return bool
     * @throws InvalidCustomerException
     */
    public function save(Record $record): bool
    {
        /**
         * @var Customer $classModel
         */
        $saved = false;

        $classModel = $this->classModel;

        $values = $record->getValues();

        $validator = Validator::make($values, [
            'full_name' => 'required|unique:customers,full_name',
        ]);

        if ($validator->fails()) {
            $message = json_encode([
                'full_name' => ['Error not unique full name'],
            ]);
            throw new InvalidCustomerException($message, 401);
        }

        $model = new $classModel($values);

        return $model->save();
    }

    /**
     * @return array
     */
    protected function getRawData(): array
    {
        return Customer::all()->toArray();
    }
}
