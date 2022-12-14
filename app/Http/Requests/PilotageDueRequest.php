<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PilotageDueRequest extends FormRequest
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
            'scnt_from' => 'required|numeric',
            'scnt_to' => 'required|numeric',
            'north_val1' => 'required|numeric',
            'north_val2' => 'required|numeric',
            'south_val1' => 'required|numeric',
            'south_val2' => 'nullable|numeric',
        ];
    }
}
