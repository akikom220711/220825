<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'contents' => 'required|max:20',
            'tag_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return[
            'contents.required' => 'The content field is required.',
            'contents.max:20' => 'The content must not be greater than 20 characters.'
        ];
    }
}
