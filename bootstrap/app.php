<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;

use App\Providers\AppServiceProvider;
use App\Middleware\CustomPreventRequestForgery;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/routes.php',
    health: '/up',
  )
  ->withProviders([
    AppServiceProvider::class,
  ])
  ->withMiddleware(function (Middleware $middleware): void {
    $middleware->web(replace: [
      PreventRequestForgery::class => CustomPreventRequestForgery::class,
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions): void {
    $exceptions->render(function (Exception $e) {
      if ($e instanceof AuthenticationException)
        return response()->json(['status' => 401, 'message' => 'Unauthenticated'], 401);

      if ($e instanceof ModelNotFoundException)
        return response()->json(['status' => 404, 'message' => 'Not found'], 404);

      if ($e instanceof RouteNotFoundException)
        return response()->json(['status' => 404, 'message' => 'Route does not exist'], 404);

      if ($e instanceof AccessDeniedHttpException)
        return response()->json(['status' => 403, 'message' => 'Access denied'], 403);
    });
  })
  ->create();
