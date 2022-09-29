<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateCertificateRequest extends FormRequest
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
    #[ArrayShape(['name' => "string", 'link' => "string", 'image' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'link' => 'nullable|url',
            'image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120']
        ];
    }
}
