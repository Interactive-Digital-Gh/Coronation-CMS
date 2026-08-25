<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Validation rules for an uploaded image, enforcing the size cap and
     * allowed types from config/uploads.php.
     */
    protected function imageRules(bool $required = false): string
    {
        return ($required ? 'required' : 'nullable')
            .'|image|mimes:'.implode(',', config('uploads.image_mimes'))
            .'|max:'.config('uploads.max_image_kb');
    }
}
