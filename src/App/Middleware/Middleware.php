<?php

namespace App\Middleware;

use App\Auth\Auth;

class Middleware
{
  public static function auth()
  {
    if (!Auth::auth()) {
      view('login');
    }
  }
}