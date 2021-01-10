<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCompanyUpdateRequest extends FormRequest
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
            'name'=>[
                'required',
                'string',
                'max:250',
            ],
            'category_name'=>'required|string|max:250',
            'region_name'=>'required|string|max:250',
            'locality_name'=>'required|string|max:250',
            'postalcode'=>'required|string|min:2',
            'streetaddress'=>[
                'required',
                'string',
                'max:250',
                Rule::unique('companies', 'streetaddress')->ignore($this->route('company')),
            ],
            'telephone'=>'required|string|max:250',
            'website'=>'required|string|max:250',
            'descr'=>'required|string|min:20',
            'follow'=>'required|int',
            'latitude'=>'required',
            'longitude'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Компания с таким названием уже существует',
            'streetaddress.unique'=>'Компания с таким адресом уже существует',
            'follow.required'=>'Поле follow/nofollow обязательное для заполнения',
        ];
    }
}
