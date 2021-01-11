<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
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
            'id'=>'int',
            'name'=>[
                'string',
                'max:250',
                (isset($data['type']) && $data['type']=='add')?Rule::unique('companies_add_edit', 'name'):'',
            ],
            'category_name'=>'required|string|max:250',
            'region_name'=>'required|string|max:250',
            'locality_name'=>'required|string|max:250',
            'postalcode'=>'required|string|min:2',
            'streetaddress'=>'required|string|max:250',
            'telephone'=>'required|string|max:250',
            'website'=>'required|string|max:250',
            'descr'=>'required|string|min:20',
            'edit'=>'required|string|min:20',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Сompany with this name already exists',
            'edit.min'=>'Your comments must be at least :min characters.',
            'descr.min'=>'Company description must be at least :min characters.',
        ];
    }
}
