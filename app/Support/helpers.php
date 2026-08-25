<?php

use Illuminate\Support\Str;

if (! function_exists('cms_asset')) {
    /**
     * URL for a stored upload path. Absolute URLs (e.g. seeded placeholders) pass through untouched.
     */
    function cms_asset(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        return Str::startsWith($path, ['http://', 'https://', '//']) ? $path : asset($path);
    }
}
