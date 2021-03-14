<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidCustomerException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
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
