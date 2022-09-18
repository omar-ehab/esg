<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'phone' => ['required', 'regex:/(01)(0|1|2|5)[0-9]{8}/'],
            'national_id' => ['required', 'numeric', 'digits:14'],
            'job_id' => ['required', 'int'],
            'cv' => ['required', 'file',
                'mimes:doc,docx,pdf',
                'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
                'max:5120'
            ],
//            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Please Enter Valid Egyptian Mobile Number',
            'email' => 'The :attribute must use a valid email address',
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}
