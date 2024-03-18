<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContentRequest extends FormRequest
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
            'description1_en' => ['required'],
            'description1_ar' => ['required'],
            'description2_en' => ['required'],
            'description2_ar' => ['required'],
            'description3_en' => ['required'],
            'description3_ar' => ['required'],
            'description4_en' => ['required'],
            'description4_ar' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'description1_en' => 'Products section text (EN)',
            'description1_ar' => 'Products section text (AR)',
            'description2_en' => 'Partners section text (EN)',
            'description2_ar' => 'Partners section text (AR)',
            'description3_en' => 'Career section text (EN)',
            'description3_ar' => 'Career section text (AR)',
            'description4_en' => 'Privacy policy (EN)',
            'description4_ar' => 'Privacy policy (AR)'
        ];
    }
}
