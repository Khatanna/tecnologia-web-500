<?php

require_once('./src/autoload.php');
require_once('./config.php');

Config::load_config();

use App\Routing\Router;
use App\Auth\Auth;
use App\Entities\UsuarioEntity;
use App\Controllers\UsuarioController;

function view(string $view_name, ?array $data): void
{
  $path = "\\src\\App\\Views\\$view_name.php";
  if (str_contains($view_name, ".")) {
    [$parent, $child] = explode(".", $view_name);
    $path = str_replace("Views\\$view_name", "Views\\$parent\\$child", $path);
  }

  if (isset($data)) {
    foreach ($data as $key => $value) {
      $GLOBALS[$key] = $value;
    }
  }
  require_once __DIR__ . $path;
}

Router::get('home', fn() => view('home'));

Router::post('home', function($request) {
  echo $request['name'];
  view('home');
});

Router::get('users', function() {
  view('users');
});

Router::get('login', function() {
  view('login');
});

Router::post('login', function($request) {
  $usuario = new UsuarioEntity($request['id']);
  Auth::login($usuario);
  view('login');
});

Router::get('greet', fn() => UsuarioController::greet());

Router::get('componentes', function() {
  view('componentes.index');
});