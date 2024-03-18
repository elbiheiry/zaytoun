<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
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
     * on creation set validation rules 
     *
     * @return array
     */
    protected function onCreate() {
        return [
            'inner_image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'outer_image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'title_en' => ['required' , 'string' , 'max:255'],
            'title_ar' => ['required' , 'string' , 'max:255'],
            'brief_en' => ['required'],
            'brief_ar' => ['required'],
            'description_en' => ['required'],
            'description_ar' => ['required']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'inner_image' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'outer_image' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'title_en' => ['required' , 'string' , 'max:255'],
            'title_ar' => ['required' , 'string' , 'max:255'],
            'brief_en' => ['required'],
            'brief_ar' => ['required'],
            'description_en' => ['required'],
            'description_ar' => ['required']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
    }

    public function attributes()
    {
        return [
            'inner_image' => 'Inner image',
            'outer_image' => 'Outer image',
            'title_en' => 'Article title (EN)',
            'title_ar' => 'Article title (AR)',
            'brief_en' => 'Article brief (EN)',
            'brief_ar' => 'Article brief (AR)',
            'description_en' => 'Article Content(en)',
            'description_ar' => 'Article Content(ar)'
        ];
    }
}
