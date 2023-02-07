<?php

namespace App\Http\Requests;

use App\Rules\BannerImageSizeRule;
use App\Rules\ScopeOfActivityIconSizeRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateScopeOfActivityRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120', new ScopeOfActivityIconSizeRule()],
            'scope_of_activity_banner_image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120', new BannerImageSizeRule()],
        ];
    }
}
