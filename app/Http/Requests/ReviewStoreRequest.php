<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
            'name'=>'required|min:2|max:250',
            'email'=>'required|email|string',
            'company_id'=>'int',
            'review'=>'string|min:20',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please complete the captcha',
            'g-recaptcha-response.captcha'=>'Captcha verification failed',
        ];
    }
}
