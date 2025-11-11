<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::prefix('api')
  ->middleware('api')
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
  });
