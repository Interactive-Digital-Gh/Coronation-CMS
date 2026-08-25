<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Maximum Image Upload Size (kilobytes)
    |--------------------------------------------------------------------------
    |
    | Hard cap applied to every image uploaded through the CMS. Enforced
    | server-side via Controller::imageRules() and mirrored client-side in
    | components/footer.blade.php. Keep this below PHP's upload_max_filesize
    | and post_max_size or uploads will be rejected before validation runs.
    |
    */

    'max_image_kb' => (int) env('UPLOAD_MAX_IMAGE_KB', 20480),

    /*
    |--------------------------------------------------------------------------
    | Allowed Image Types
    |--------------------------------------------------------------------------
    |
    | Extensions accepted by the "mimes" rule (matched against the file's
    | real content type, so case does not matter).
    |
    */

    'image_mimes' => ['jpeg', 'jpg', 'png', 'gif', 'webp'],

];
