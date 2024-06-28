<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            [
                'dateFrom' => 'date',
                'dateTo' => 'date',
                'priceFrom' => 'numeric',
                'priceTo' => 'numeric',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'dateFrom' => 'this field must be date',
            'dateTo' => 'this field must be date',
            'priceFrom' => 'this field must have a number',
            'priceTo' => 'this field must have a number',
        ];
    }
}
