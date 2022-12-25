<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuezCanalTierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'number' => 'required|numeric|min:1',
            'southbound_percentage' => 'required|numeric|min:0|max:1',
            'northbound_percentage' => 'required|numeric|min:0|max:1',
        ];
    }
}
