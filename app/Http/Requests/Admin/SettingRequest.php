<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required' , 'email' , 'string' , 'max:255'],
            'phone' => ['required'],
            'address_en' => ['required' , 'string' , 'max:255'],
            'address_ar' => ['required' , 'string' , 'max:255'],
            'hours_en' => ['required' , 'string' , 'max:255'],
            'hours_ar' => ['required' , 'string' , 'max:255'],
            'copyright_en' => ['required' , 'string' , 'max:255'],
            'copyright_ar' => ['required' , 'string' , 'max:255'],
            'about_en' => ['required'],
            'about_ar' => ['required'],
            'map' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'phone' => 'Phone number' ,
            'address_ar' => 'Address (AR)',
            'address_en' => 'Address (EN)',
            'hours_ar' => 'Working hours (AR)',
            'hours_en' => 'Working hours (EN)',
            'copyright_ar' => 'Copyrights (AR)',
            'copyright_en' => 'Copyrights (EN)',
            'about_ar' => 'Footer context (AR)',
            'about_en' => 'Footer context (EN)',
            'map' => 'Map'
        ];
    }
}
