<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 28.1 Comment the default false:
            //return false;

        // 28.2 return true:
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
            // 28.3 Required feilds of Customer:
                'customer' => 'required',
                'star' => 'required|integer|between:0,5',
                'review' => 'required'
        ];
    }
}
