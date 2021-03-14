<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class CacheCustomer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class CacheCustomer extends CustomerRecord
{
    /**
     * @var string
     */
    protected $cache = 'memcache';

}
