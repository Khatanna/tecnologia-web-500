<?php

require_once('./src/autoload.php');
require_once('./config.php');

Config::load_config();

use Models\Users;

class Router
{
  public static function get(string $path, callable $callback)
  {
    $path_uri = array_reverse(explode("/", $_SERVER['REQUEST_URI']))[0];
    if ($path_uri === $path) {
      echo $callback();
    }
  }

  public static function post(string $path, callable $callback)
  {
    // $path_uri = array_reverse(explode("/", $_SERVER['REQUEST_URI']))[0];
  }
}

function view($view_name, $data)
{
  header('Content-Type: text/html');
  $path = __DIR__ . "\\src\\views\\$view_name.php";

  $templateContent = file_get_contents($path);

  foreach ($data as $key => $value) {
    var_dump($value);
    // $templateContent = str_replace("{{$key}}", $value, $templateContent);
  }

  echo $templateContent;
}

Router::get('home', function () {
});

Router::get('users', function () {
});

Router::get('componentes', function () {
  // $json = json_encode();
  // header('Content-Type: application/json');
  // var_dump(get_declared_classes());
  return view('home', ["data" => Users::all()]);
});
