<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminLocalityUpdateRequest extends FormRequest
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
            'name'=>'string|max:250',
            'url'=>['regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/',
                Rule::unique('locality')->ignore($this->route('locality'))
            ],
        ];
    }
    public function messages()
    {
        return [
            'url.unique'=>'Такой url уже существует',
            'url.regex'=>'Не правильный формат url'
        ];
    }
}
