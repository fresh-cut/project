<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminOffersCompanyUpdateRequest extends FormRequest
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
        $data=Request::all();
        return [
            'company_id'=>'required|int',
            'name'=>[
                'required',
                'string',
                'max:250',
                (isset($data['type']) && $data['type']=='add')?Rule::unique('companies', 'name'):
                    Rule::unique('companies', 'name')->ignore($data['company_id']),
            ],
            'category_name'=>'required|string|max:250',
            'region_name'=>'required|string|max:250',
            'locality_name'=>'required|string|max:250',
            'postalcode'=>'required|string|min:2',
            'streetaddress'=>[
                'required',
                'string',
                'max:250',
                (isset($data['type']) && $data['type']=='add')?Rule::unique('companies', 'streetaddress'):
                    Rule::unique('companies', 'streetaddress')->ignore($data['company_id']),
            ],
            'telephone'=>'required|string|max:250',
            'website'=>'required|string|max:250',
            'descr'=>'required|string|min:20',
            'follow'=>'required|int',
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
