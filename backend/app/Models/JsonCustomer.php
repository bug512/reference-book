<?php

namespace App\Models;

use App\Services\JsonStorageService;
use App\Traits\RecorderTrait;

/**
 *
 * Class JsonCustomer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class JsonCustomer extends AbstractRecord
{
    use RecorderTrait;

    /**
     * {@inheritdoc}
     */
    public static function getService()
    {
        return JsonStorageService::class;
    }

}
