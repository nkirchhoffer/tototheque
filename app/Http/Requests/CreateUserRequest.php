<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'                  => 'required|alpha_spaces',
            'nick'                  => 'required|alpha_num|between:3,32|unique:users',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|between:6,64',
            'password_confirmation' => 'required|same:password',
            'phone_number'          => 'nullable',
        ];
    }
}
