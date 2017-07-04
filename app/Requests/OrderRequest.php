<?php

namespace App\Http\Requests;

class OrderRequest extends Request
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
                    'type' => [
                        'required',
                        'string',
                    ],
                    'quantity' => [
                        'required',
                        'numeric'
                    ],
                    'price' => [
                        'required',
                        'regex:/^\d*(\.\d{1,2})?$/'
                    ]
                ];
            case 'PATCH':
                return [
                    'type' => [
                        'sometimes',
                        'required',
                        'string',
                    ],
                    'quantity' => [
                        'sometimes',
                        'required',
                        'numeric'
                    ],
                    'price' => [
                        'sometimes',
                        'required',
                        'regex:/^\d*(\.\d{1,2})?$/'
                    ]
                ];
            default:
                return [];
        }
    }
}
