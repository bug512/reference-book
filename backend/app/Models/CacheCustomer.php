<?php

namespace App\Models;

use App\Services\CacheStorageService;
use App\Traits\RecorderTrait;
use Illuminate\Support\Facades\Config;

/**
 *
 * Class CacheCustomer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class CacheCustomer extends AbstractRecord
{
    use RecorderTrait;

    /**
     * @var string
     */
    protected $driver;

    public function __construct()
    {
        $this->driver = Config::get('reference_book.cache_driver', 'file');
    }

    /**
     * @return mixed|string
     */
    public static function getCacheDriver()
    {
        return (new static())->driver;
    }

    /**
     * {@inheritdoc}
     */
    public static function getService()
    {
        return CacheStorageService::class;
    }

}
