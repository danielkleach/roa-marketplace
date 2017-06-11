<?php

namespace App\Http\Requests;

class ProfileRequest extends Request
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
            case 'POST':
                return [
                    'character_name' => [
                        'required',
                        'string',
                    ],
                    'race' => [
                        'required',
                    ]
                ];
            case 'PATCH':
                return [
                    'character_name' => [
                        'sometimes',
                        'required',
                        'string',
                    ],
                    'race' => [
                        'sometimes',
                        'required',
                    ]
                ];
            default:
                return [];
        }
    }
}
