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

    /**
     * Strip Microsoft Word / Office paste bloat from rich-text input while
     * preserving basic structural HTML.
     *
     * Pasting from Word carries a large <style> block, conditional comments,
     * office-namespaced tags (<o:p>, <w:...>) and inline "mso-*" styling. That
     * noise bloats storage (a short bio can balloon past a column's limit) and
     * is a stored-XSS vector when the content is rendered downstream. Structural
     * tags and text are left intact.
     */
    protected function cleanRichText(?string $html): ?string
    {
        if ($html === null || trim($html) === '') {
            return $html;
        }

        // MS Word conditional comments: <!--[if ...]> ... <![endif]-->
        $html = preg_replace('/<!--\[if[^\]]*?\]>.*?<!\[endif\]-->/is', '', $html);
        // <style> / <script> blocks (Word pastes a large <style> block)
        $html = preg_replace('#<(style|script)\b[^>]*>.*?</\1>#is', '', $html);
        // Office-namespaced tags: <o:p>, <w:...>, <m:...>, <v:...>, etc.
        $html = preg_replace('#</?[a-z]+:[^>]*>#is', '', $html);
        // Inline noise attributes (mso-* styles, Word classes, lang/align)
        $html = preg_replace('/\s(?:class|style|lang|align)\s*=\s*("[^"]*"|\'[^\']*\')/i', '', $html);
        // Collapse whitespace introduced by the removals
        $html = preg_replace('/[ \t\r\n]{2,}/', ' ', $html);
        // Tidy whitespace left between a tag name and its closing ">" (e.g. "<p >")
        $html = preg_replace('/<(\/?[a-z][a-z0-9]*)\s+>/i', '<$1>', $html);

        return trim($html);
    }
}
