<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules = [
            'name'      => ['required','min:2','max:255'],
            'email'     => ['required','min:2','max:20','email','unique:users'],
            'password'  => ['required','same:password_confirmation'],
        ];

        return $rules;

    }//end of rules

}//end of request