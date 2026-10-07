<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Quote request notifications
    |--------------------------------------------------------------------------
    |
    | Every quote request submitted through the website (POST /api/quote/request)
    | is saved to the quote_requests table and, when this list is non-empty,
    | also emailed to these addresses. QUOTE_NOTIFY_EMAIL is a comma-separated
    | list; leave it empty to store requests without sending email.
    |
    */

    'notify_to' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('QUOTE_NOTIFY_EMAIL', ''))
    ))),

];
