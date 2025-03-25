<?php

use App\Http\Middleware as AppMiddleware;
use DipeshSukhia\LaravelHtmlMinify;
use Illuminate\Http\Middleware;
use Illuminate\Foundation;

return Foundation\Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Foundation\Configuration\Middleware $middleware) {
        $middleware->web(append: [
            LaravelHtmlMinify\Middleware\LaravelMinifyHtml::class,
            Middleware\AddLinkHeadersForPreloadedAssets::class,
            AppMiddleware\HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Foundation\Configuration\Exceptions $exceptions) {
        //
    })
    ->withRouting(web: __DIR__ . '/../routes/web.php',)
    ->create();
