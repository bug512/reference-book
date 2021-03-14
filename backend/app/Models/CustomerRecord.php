<?php

namespace App\Models;

use App\Contracts\Record;
use App\Traits\RecorderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * @param array $attributes
     */
    public static function create(array $attributes)
    {
        $model = new static();
        foreach ($attributes as $attribute => $value) {
            if (in_array($attribute, $model->fillable, true)) {
                $model->{$attribute} = $value;
            }
        }
    }
}
