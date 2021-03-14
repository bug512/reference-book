<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class AbstractRecord
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
abstract class AbstractRecord implements Record
{
    use RecorderTrait;

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

    /**
     * @param array $attributes
     * @return mixed
     */
    abstract public static function create(array $attributes);
}
