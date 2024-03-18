<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
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
            'image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'brochure' => $this->brochure ? ['file' , 'mimes:pdf,docX'] : '',
            'size' => ['required' ,'numeric'],
            'category_id' => ['not_in:0'],
            'name_en' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255'],
            'location_en' => ['required' , 'string' , 'max:255'],
            'location_ar' => ['required' , 'string' , 'max:255'],
            'sector_en' => ['required' , 'string' , 'max:255'],
            'sector_ar' => ['required' , 'string' , 'max:255'],
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
            'image' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'brochure' => $this->brochure ? ['file' , 'mimes:pdf,docX'] : '',
            'size' => ['required' ,'numeric'],
            'category_id' => ['not_in:0'],
            'name_en' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255'],
            'location_en' => ['required' , 'string' , 'max:255'],
            'location_ar' => ['required' , 'string' , 'max:255'],
            'sector_en' => ['required' , 'string' , 'max:255'],
            'sector_ar' => ['required' , 'string' , 'max:255'],
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
            'image' => 'Image',
            'brochure' => 'Project brochure',
            'size' => 'Project size',
            'category_id' => 'Project category',
            'name_en' => 'Project name (EN)',
            'name_ar' => 'Project name (AR)',
            'location_en' => 'Project locations (EN)',
            'location_ar' => 'Project locations (AR)',
            'sector_en' => 'Project sector (EN)',
            'sector_ar' => 'Project sector (AR)',
            'brief_en' => 'Project brief (EN)',
            'brief_ar' => 'Project brief (AR)',
            'description_en' => 'Project Content(en)',
            'description_ar' => 'Project Content(ar)',
            'map' => 'Project location map'
        ];
    }
}
