<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidCustomerException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

/**
 * Class CustomerRequest
 * @package App\Http\Requests
 *
 * @property string $database
 * @property string $full_name
 * @property string $email
 * @property string $phone
 */
class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $storage = array_keys(Config::get('reference_book.storage', ['Mysql' => 'mysqlStorage']));

        return [
            'database' => [
                'required',
                Rule::in($storage),
            ],
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }

    /**
     * @param Validator $validator
     * @throws InvalidCustomerException
     */
    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->getMessageBag()->getMessages();

        throw (new InvalidCustomerException(json_encode($messages), 401));
    }
}
