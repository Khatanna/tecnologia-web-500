<?php

namespace App\Routing;

use App\Middleware\Middleware;
use function PHPUnit\Framework\isEmpty;

class Router
{
  private static ?self $instance = null;

  private array $middlewares;

  private function __construct()
  {
    $this->middlewares = [];
  }

  public static function get_instance(): self
  {
    if (self::$instance == null) {
      self::$instance = new static();
    }

    return self::$instance;
  }

  private function execute(string $path, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      extract($_GET);
      $path = "/" . $path;
      $route = str_replace("/tecnologia-web-500", "", $_SERVER['REQUEST_URI']);
      $params = array_reverse(explode("/", $route));

      foreach ($params as $param) {
        $path = preg_replace("/{.+}/", $param, $path);
      }

      foreach (explode("/", $path) as $arg) {
        if (is_numeric($arg)) {
          $send_param = $arg;
        }
      }

      if (isset($page)) {
        $route = str_replace("?page=$page", "", $route);
        if (isset($search)) {
          $route = str_replace("&search=$search", "", $route);
        }
      } else if (isset($search)) {
        $route = str_replace("?search=$search", "", $route);
      }

      if ($route === $path) {
        if (isset($send_param)) {
          $callback(intval($send_param));
        } else if (isset($page)) {
          $callback(page: $page, search: $search ?? null);
        } else {
          $callback();
        }
      }
    }
  }

  public static function get(string $path, callable $callback): ?self
  {
    self::get_instance()->execute($path, $callback);
    return self::get_instance();
  }

  public static function post(string $path, callable $callback)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $path = "/" . $path;
      $route = str_replace("/tecnologia-web-500", "", $_SERVER['REQUEST_URI']);
      $params = array_reverse(explode("/", $route));

      foreach ($params as $param) {
        $path = preg_replace("/{.+}/", $param, $path);
      }

      foreach (explode("/", $path) as $arg) {
        if (is_numeric($arg)) {
          $send_param = $arg;
        }
      }

      if ($route === $path) {
        if (isset($send_param)) {
          $callback($_POST, intval($send_param));
        } else {
          $callback();
        }
      }
    }
  }

  public function middleware(string $name): void
  {
    $this->middlewares[] = $name;
    // Middleware::$name();
  }
}
