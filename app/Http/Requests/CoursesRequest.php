<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
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
            'course_code'   =>  'required|alpha|min:2',
            'course_descr'   =>  'required|min:3',
            'department'   =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'course_descr.required'  =>  'The course description field is required.',
            'course_descr.min'  =>  'The course description must be at least 3 characters.',
        ];
    }
}
