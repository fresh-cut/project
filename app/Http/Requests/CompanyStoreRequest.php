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
            'category'=>'string|max:250',
            'region_name'=>'string|max:250',
            'locality_name'=>'string|max:250',
            'postalcode'=>'string|min:2',
            'streetaddress'=>'string|max:250',
            'telephone'=>'string|max:250',
            'website'=>'string|max:250',
            'descr'=>'string',
            'edit'=>'string',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Сompany with this name already exists',
        ];
    }
}
