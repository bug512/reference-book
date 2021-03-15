<?php

namespace App\Models;

use App\Services\StorageService;
use App\Traits\RecorderTrait;

/**
 *
 * Class CustomerRecord
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class CustomerRecord extends AbstractRecord
{
    use RecorderTrait;

    /**
     * {@inheritdoc}
     */
    public static function getService()
    {
        return StorageService::SERVICE_NAME;
    }
}
