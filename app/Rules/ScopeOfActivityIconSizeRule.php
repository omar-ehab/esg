<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ScopeOfActivityIconSizeRule implements Rule
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
        if ($width != $height) {
            $this->error_message = 'Scope of activity icon has invalid image dimensions, icon should be square (width = height)';
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
