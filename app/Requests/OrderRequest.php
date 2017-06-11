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
                        'numeric'
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
                        'numeric'
                    ]
                ];
            default:
                return [];
        }
    }
}
