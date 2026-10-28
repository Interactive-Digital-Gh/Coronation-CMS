<?php

return [
    // The React frontend renders notifications itself (see HandleInertiaRequests),
    // so flasher must not inject its own scripts into responses.
    'inject_assets' => false,

    'flash_bag' => [
        'success' => ['success'],
        'error' => ['error', 'danger'],
        'warning' => ['warning', 'alarm'],
        'info' => ['info', 'notice', 'alert'],
    ],
];
