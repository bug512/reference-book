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
class JsonCustomer implements Record
{
    use RecorderTrait;

    /**
     * @var string
     */
    protected $file_name = 'database.xlsx';

    protected $dir_path = 'storage/public/databases/xlsx';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];
}
