<?php

namespace App\Routing;

class Router
{
  public static function get(string $path, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $path = "/" . $path;
      $route = str_replace("/tecnologia-web-500", "", $_SERVER['REQUEST_URI']);
      $params = array_reverse(explode("/", $route));

      foreach ($params as $param) {
        $path = preg_replace("/{.+}/", $param, $path);
      }

      if ($route === $path) {
        $callback();
      }
    }
  }

  public static function post(string $path, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $path_uri = array_reverse(explode("/", $_SERVER['REQUEST_URI']))[0];

      if ($path_uri === $path) {
        $callback($_POST);
      }
    }
  }
}
