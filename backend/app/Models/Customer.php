<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class Customer
 * @package App\Models
 *
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class Customer extends Model implements Record
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'customers';

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
    public function getValues(): array
    {
        return $this->toArray();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function setValues(array $values)
    {
        $this->setRawAttributes($values);
    }
}
