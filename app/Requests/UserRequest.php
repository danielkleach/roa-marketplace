<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
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
        switch ($this->method()) {
            case 'PATCH':
                return [
                    'password' => [
                        'required',
                        'string',
                        'min:8'
                    ]
                ];
            default:
                return [];
        }
    }
}
