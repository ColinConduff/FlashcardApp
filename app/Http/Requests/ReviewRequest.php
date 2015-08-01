<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReviewRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required|integer|in:1,2,3,4,5',
            'title' => 'required|string',
            'body' => 'required|string',
        ];
    }
}
