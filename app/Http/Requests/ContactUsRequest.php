<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email',
            //'regex:/(+201)(0|1|2|5)[0-9]{8}/'
            'phone' => ['required', 'string'],
            'company' => ['required', 'string'],
            'country_id' => ['required', 'int'],
            'message' => 'required|string|min:10',
            'newsletter' => 'sometimes|boolean',
//            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must use a valid email address',
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}
