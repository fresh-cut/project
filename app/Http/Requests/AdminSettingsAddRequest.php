<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSettingsAddRequest extends FormRequest
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
            'admin_email'=>'nullable|email',
            'count_last_review'=>'nullable|integer',
            'count_popular_company'=>'nullable|integer',
            'count_companies_review'=>'nullable|integer',

        ];
    }

    public function messages()
    {
        return [
            'email.email'=>'Не правильный формат e-mail',
        ];
    }
}
