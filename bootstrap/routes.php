<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::prefix('api')
  // ->middleware(['api', 'auth:sanctum'])
  ->middleware(['api'])
  ->namespace('App\Controllers')
  ->group(function () {

    Route::prefix('sample')
      ->group(function () {
        Route::get('', [\App\Controllers\SampleController::class, 'get_all']);
        Route::get('{id}', [\App\Controllers\SampleController::class, 'get']);
        Route::post('', [\App\Controllers\SampleController::class, 'add']);
        Route::put('', [\App\Controllers\SampleController::class, 'edit']);
        Route::delete('', [\App\Controllers\SampleController::class, 'delete']);
      });

    Route::prefix('posts')
      ->group(function () {
        Route::get('', [\App\Controllers\PostController::class, 'get_all_per_user']);
        Route::post('', [\App\Controllers\PostController::class, 'create']);
        Route::get('/{post}', [\App\Controllers\PostController::class, 'get']);
        Route::put('/{post}', [\App\Controllers\PostController::class, 'edit']);
        Route::delete('/{post}', [\App\Controllers\PostController::class, 'delete']);

        Route::post('/{post}/comments', [\App\Controllers\CommentController::class, 'create']);

        Route::post('/{post}/likes', [\App\Controllers\LikeController::class, 'add']);
        Route::delete('/{post}/likes', [\App\Controllers\LikeController::class, 'remove']);
      });

    Route::prefix('comments')
      ->group(function () {
        Route::put('/{comment}', [\App\Controllers\CommentController::class, 'edit']);
        Route::delete('/{comment}', [\App\Controllers\CommentController::class, 'delete']);
      });
  });
