<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
     * @return array
     */
    public static function getAttributes()
    {
        return (new static())->fillable;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    abstract public static function create(array $attributes): self;

    /**
     * @return mixed
     */
    abstract public static function getService();

    /**
     * @return Collection
     */
    abstract public static function getAll(): Collection;

    /**
     * @param string $full_name
     * @return bool
     */
    abstract public static function validateUniqFullName(string $full_name):bool ;
}
