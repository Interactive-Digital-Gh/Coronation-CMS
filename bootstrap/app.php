<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Uploads larger than PHP's post_max_size are rejected before validation
        // runs; show the same kind of error the image size rule would instead of a 413 page.
        $exceptions->render(function (PostTooLargeException $e, Request $request) {
            if ($request->expectsJson()) {
                return null;
            }

            $maxMb = round(config('uploads.max_image_kb') / 1024, 1);

            return back()->withErrors([
                'upload' => "The upload is too large. Images must be no bigger than {$maxMb} MB.",
            ]);
        });
    })->create();
