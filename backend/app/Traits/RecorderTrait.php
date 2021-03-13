<?php

namespace App\Traits;

/**
 * Trait RecorderTrait
 * @package App\Traits
 */
trait RecorderTrait
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
     * @param array $value
     * @return bool
     */
    public function setValue(array $value): bool
    {
        $this->values = $value;
    }
}
