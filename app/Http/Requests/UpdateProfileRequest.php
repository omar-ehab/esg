<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
//            'mobile' => ['required', 'regex:/(01)(0|1|2|5)[0-9]{8}/', 'unique:users,mobile,' . auth()->id()],
        ];
    }
}
