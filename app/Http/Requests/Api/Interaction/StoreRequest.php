<?php

namespace App\Http\Requests\Api\Interaction;

use Domains\Interaction\Enums\InteractionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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

            'type' => [
                'string',
                'required',
                new Enum(
                    type: InteractionType::class
                )
            ],
            'content' => [
                'nullable',
                'string'
            ],
            'contact' => [
                'required',
                'int',
                'exists:contacts,id'
            ],
            'project' => [
                'int',
                'exists:projects,id'
            ]
        ];
    }
}
