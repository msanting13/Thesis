<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumberRule;

class ExamineeRequest extends FormRequest
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
            'name'          =>          ['required', 'string', 'max:255','unique:tbl_examinees'],
            'address'       =>          ['required'],
            'gender'        =>          ['required'],
            'birthdate'     =>          ['required','date'],
            'cellnumber'    =>          ['required',new PhoneNumberRule],
            'email'         =>          ['required', 'string', 'email', 'max:255', 'unique:tbl_examinees'],
            'password'      =>          ['required', 'string', 'min:8'],
        ];
    }
}
