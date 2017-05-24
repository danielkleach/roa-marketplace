<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
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
                        'min:8',
                        'confirmed'
                    ]
                ];
            default:
                return [];
        }
    }
}
