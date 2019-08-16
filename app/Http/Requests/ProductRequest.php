<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 18.1 Change false to true:
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
            // 18.2 Fill in the Required fields:
                'name' => 'required|max:255|unique:products',
                'description' => 'required',
                'price' => 'required|max:10',
                'stock' => 'required|max:6',
                'discount' => 'required|max:2',
        ];
    }
}
