<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class BannerImageSizeRule implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(protected string $error_message = '')
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $image_details = getimagesize($value);
        $width = $image_details[0];
        if ($width != 1920) {
            $this->error_message = 'The banner image has invalid image width, the correct width is 1920 px';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->error_message;
    }
}
