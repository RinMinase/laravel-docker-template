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
        Route::get('', [\App\Http\Controllers\SampleController::class, 'get_all']);
        Route::get('{id}', [\App\Http\Controllers\SampleController::class, 'get']);
        Route::post('', [\App\Http\Controllers\SampleController::class, 'add']);
        Route::put('', [\App\Http\Controllers\SampleController::class, 'edit']);
        Route::delete('', [\App\Http\Controllers\SampleController::class, 'delete']);
      });
  });
