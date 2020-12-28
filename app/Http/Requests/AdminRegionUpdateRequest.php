<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRegionUpdateRequest extends FormRequest
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
            'name'=>['string', 'max:250',
                Rule::unique('region')->ignore($this->route('region'))
                ],
            'url'=>['regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/',
                Rule::unique('region')->ignore($this->route('region'))
            ],
        ];
    }
    public function messages()
    {
        return [
            'url.unique'=>'Такой url уже существует',
            'name.unique'=>'Такой регион уже существует',
            'url.regex'=>'Не правильный формат url'
        ];
    }
}
