<?php

namespace App\Http\Requests;

use App\Rules\BannerImageSizeRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateBannerRequest extends FormRequest
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
     * @return array
     */
    #[ArrayShape(['title' => "string", 'page_id' => "string", 'image' => "array"])]
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'page_id' => 'required|int',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120', new BannerImageSizeRule()]];
    }
}
