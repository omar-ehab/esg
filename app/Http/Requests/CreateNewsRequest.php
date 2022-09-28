<?php

namespace App\Http\Requests;

use App\Rules\NewsImageSizeRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateNewsRequest extends FormRequest
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
    #[ArrayShape(['title' => "string", 'short_description' => "string", 'content' => "string", 'image' => "array"])]
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'short_description' => 'required|string|min:10',
            'content' => 'required|string|min:10',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120', new NewsImageSizeRule()]
        ];
    }
}
