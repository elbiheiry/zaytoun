<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'image' => ['image' , 'mimes:png,jpg,jpeg' ,'max:2048'],
            'years' => ['required' , 'numeric'],
            'title1_en' => ['required' , 'string' , 'max:255'],
            'title1_ar' => ['required' , 'string' , 'max:255'],
            'description1_en' => ['required'],
            'description1_ar' => ['required'],
            'title2_en' => ['required' , 'string' , 'max:255'],
            'title2_ar' => ['required' , 'string' , 'max:255'],
            'description1_en' => ['required'],
            'description1_ar' => ['required'],
            'mission_en' => ['required'],
            'mission_ar' => ['required'],
            'vision_en' => ['required'],
            'vision_ar' => ['required'],
            'message_en' => ['required'],
            'message_ar' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'First section image',
            'years' => 'Years of experience',
            'title1_en' => 'First section title (EN)',
            'title1_ar' => 'First section title (AR)',
            'description1_en' => 'First section description (EN)',
            'description1_ar' => 'First section title (AR)',
            'title2_en' => 'Second section title (EN)',
            'title2_ar' => 'Second section title (AR)',
            'description2_en' => 'Second section description (EN)',
            'description2_ar' => 'Second section title (AR)',
            'mission_en' => 'Our mission (EN)',
            'mission_ar' => 'Our mission (AR)',
            'vision_en' => 'Our vision (EN)',
            'vision_ar' => 'Our vision (AR)',
            'message_en' => 'Message from our ceo (EN)',
            'message_ar' => 'Message from our ceo (AR)'
        ];
    }
}
