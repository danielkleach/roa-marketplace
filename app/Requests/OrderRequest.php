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
