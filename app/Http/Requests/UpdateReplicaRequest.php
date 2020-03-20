<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReplicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('manage_books');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'publisher'   => 'required|exists:publishers,id',
            'isbn'        => 'required|digits:13',
            'cover'       => 'nullable|file|image',
            'state'       => 'required|digits:1',
            'publishedAt' => 'required|date',
            'boughtAt'    => 'required|date',
        ];
    }
}
