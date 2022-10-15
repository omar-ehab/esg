<?php

namespace App\Http\Requests;

use App\Rules\BannerImageSizeRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'service_banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120', new BannerImageSizeRule()],
            'parent_service' => 'sometimes|integer',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ];
    }
}
