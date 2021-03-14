<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidCustomerException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

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
        return [
            'database' => [
                'required',
                Rule::in(Config::get('reference_book.storage', ['mysql'])),
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
