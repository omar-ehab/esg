<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateJobRequest extends FormRequest
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
    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:jobs,name,' . $this->job->id
        ];
    }
}
