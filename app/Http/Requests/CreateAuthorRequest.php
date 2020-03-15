<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('manage_authors');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'biography' => 'required|between:6,280',
            'country_code' => 'required|between:2,2',
            'birthdate' => 'required|date',
            'death' => 'nullable|date'
        ];
    }
}
