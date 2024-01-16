<?php

namespace App\Http\Requests\Api\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => [
                'nullable',
                'string',
                'max:20'
            ],
            'name.first' => [
                'required',
                'string',
                'min:2',
                'max:82'
            ],
            'name.middle' => [
                'nullable',
                'string',
                'min:2',
                'max:82'
            ],
            'name.last' => [
                'nullable',
                'string',
                'min:2',
                'max:82'
            ],
            'name.preferred' => [
                'nullable',
                'string',
                'min:2',
                'max:82'
            ],
            'name.full' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'email' => [
                'nullable',
                'email:rfc,dns'
            ]
        ];
    }
}
