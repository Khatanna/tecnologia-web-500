<?php

namespace App\Routing;
class Router
{
  public static function get(string $path, callable|string $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $path_uri = array_reverse(explode("/", $_SERVER['REQUEST_URI']))[0];

      if ($path_uri === $path) {
        if (is_callable($callback)) {
          $callback();
        } else {

        }
      }
    }
  }

  public static function post(string $path, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $path_uri = array_reverse(explode("/", $_SERVER['REQUEST_URI']))[0];

      if ($path_uri === $path) {
        if (is_callable($callback)) {
          $callback($_POST);
        } else {

        }
      }
    }
  }
}