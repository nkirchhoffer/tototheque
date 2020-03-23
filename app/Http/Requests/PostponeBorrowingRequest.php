<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostponeBorrowingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('manage_borrowings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'startedAt'   => 'required|date',
            'finishingAt' => 'required|date|after:startedAt|after:now'
        ];
    }
}
