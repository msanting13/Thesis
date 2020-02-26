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
            'course_code'       =>  'required|string|min:2|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/',
            'course_descr'      =>  'required|string|min:3|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/',
            'department'        =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'course_code.regex'  =>  'The course code field must not contain any special characters.',
            'course_descr.required'  =>  'The course description field is required.',
            'course_descr.regex'  =>  'The course description field must not contain any special characters.',
            'course_descr.min'  =>  'The course description must be at least 3 characters.',
        ];
    }
}
