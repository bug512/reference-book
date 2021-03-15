<?php

namespace App\Imports;

use App\Models\XlsxCustomer;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Class CustomerImport
 * @package App\Exports
 */
class CustomerImport implements ToArray, WithHeadingRow
{
    public $sheetData;

    public function __construct(){
        $this->sheetData = [];
    }

    /**
     * @param array $array
     * @return array
     */
    public function array(array $array)
    {
        $record = [];

        foreach (XlsxCustomer::getAttributes() as $key => $attribute) {
            $record[$attribute] = $array[$key];
        }

        $this->sheetData[] = $record;

        return $record;
    }
}
