<?php

namespace App\Traits;

use App\Exceptions\InvalidCustomerException;
use App\Models\AbstractRecord;
use App\Services\StorageService;
use Illuminate\Support\Collection;

/**
 * Trait RecorderTrait
 * @package App\Traits
 */
trait RecorderTrait
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * {@inheritdoc}
     */
    function __get($name)
    {
        return $this->get($name);
    }

    /**
     * {@inheritdoc}
     */
    function __set($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    function __isset($name)
    {
        return isset($this->values[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($index)
    {
        if (in_array($index, $this->fillable, true)) {
            return $this->values[$index];
        }
        return null;
    }

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
    public function setValues(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param array $values
     * @return RecorderTrait
     */
    public static function create(array $values): self
    {
        $model = new self();

        foreach ($values as $attribute => $value) {
            if (!in_array($attribute, $model->fillable, true)) {
                unset($values[$attribute]);
            }
        }

        $model->setValues($values);

        return $model;
    }

    /**
     * @return Collection
     */
    public static function getAll(): Collection
    {
        /**
         * @var StorageService $service
         */
        $service = self::getService();

        return $service::getAll();
    }

    /**
     * @param string $full_name
     * @return bool
     * @throws InvalidCustomerException
     */
    public static function validateUniqFullName(string $full_name): bool
    {
        foreach (self::getAll() as $item) {
            /**
             * @var AbstractRecord $item
             */
            if ($item->full_name === $full_name) {
                throw new InvalidCustomerException(json_encode([
                    'full_name' => ['Error not unique full name'],
                ]), 401);
            }
        }

        return true;
    }
}
