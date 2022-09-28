<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NewsImageSizeRule implements Rule
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
        $height = $image_details[1];
        if ($width != 560 || $height != 380) {
            $this->error_message = 'The news image has invalid image dimensions, the correct dimensions is 560x380';
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
