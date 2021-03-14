<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class JsonCustomer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class JsonCustomer extends CustomerRecord
{
    /**
     * @var string
     */
    protected $file_name = 'database.json';

    /**
     * @var string
     */
    protected $dir_path = 'storage/public/databases/json';
}
