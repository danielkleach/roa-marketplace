<?php

namespace App\Http\Requests;

class ItemRequest extends Request
{
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
                    'name' => [
                        'required',
                        'string',
                    ],
                    'image' => [
                        'required',
                        'string'
                    ],
                    'rarity' => [
                        'required',
                        'string'
                    ]
                ];
            case 'PATCH':
                return [
                    'name' => [
                        'sometimes',
                        'required',
                        'string',
                    ],
                    'image' => [
                        'sometimes',
                        'required',
                        'string'
                    ],
                    'rarity' => [
                        'sometimes',
                        'required',
                        'string'
                    ]
                ];
            default:
                return [];
        }
    }
}
