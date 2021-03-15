<?php

namespace App\Models;

use App\Services\XlsxStorageService;
use App\Traits\RecorderTrait;

/**
 *
 * Class XlsxCustomer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class XlsxCustomer extends AbstractRecord
{
    use RecorderTrait;

    /**
     * {@inheritdoc}
     */
    public static function getService()
    {
        return XlsxStorageService::class;
    }
}
