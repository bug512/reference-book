<?php

namespace App\Models;

use App\Contracts\Record;

class CustomerRecord implements Record
{
    protected $values = [];

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $values
     * @return bool
     */
    public function setValues(array $values): bool
    {
       $this->values = $values;
    }
}
