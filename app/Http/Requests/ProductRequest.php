<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;


class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => [
                'file',
            ],

            'title' => [
                'string',
            ],
            'description' => [
                'string',
            ],
            'buy' => 'required',
            'sell' => 'required',
            'stock' => [
                'integer',
            ],
            'category_id' => [
                'integer'
            ]
        ];
    }
}
