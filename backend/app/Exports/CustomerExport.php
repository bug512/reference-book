<?php

namespace App\Exports;

use App\Models\XlsxCustomer;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Class CustomerExport
 * @package App\Exports
 */
class CustomerExport implements FromArray, WithHeadings
{
    protected $customers;

    /**
     * CustomerExport constructor.
     * @param array $customers
     */
    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return XlsxCustomer::getAttributes();
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->customers;
    }
}
