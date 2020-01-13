<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title' => 'required',
            'expert' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'expert.required' => 'Expert is required!',
            'body.required' => 'Body is required!',
        ];
    }
}
