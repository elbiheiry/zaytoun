<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectSliderRequest extends FormRequest
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
            'image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'image' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg']
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
            'image' => 'Image'
        ];
    }
}
