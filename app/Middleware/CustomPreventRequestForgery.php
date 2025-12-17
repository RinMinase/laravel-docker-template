<?php

namespace App\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;

class CustomPreventRequestForgery extends PreventRequestForgery {
  protected $except = [
    '*',
  ];
}
