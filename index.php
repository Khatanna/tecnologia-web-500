<?php

require_once('./src/autoload.php');
require_once('./config.php');

Config::load_config();

use App\Routing\Router;
use App\Controllers\UsuarioController;
use App\Models\Usuarios;

function view(string $view_name, ?array $data = null): void
{
  function route(string $view_name, ?array $data = null): string
  {
    foreach ($data as $key => $value) {
      if (isset($data[$key])) {
        return "$view_name/$value";
      }
    }

    return "$view_name";
  }
  $path = "\\src\\App\\Views\\$view_name.php";
  if (str_contains($view_name, ".")) {
    [$parent, $child] = explode(".", $view_name);
    $path = str_replace("Views\\$view_name", "Views\\$parent\\$child", $path);
  }

  if (isset($data)) {
    extract($data);
  }

  require_once __DIR__ . $path;
}

Router::get('home', fn () => view('home', ['user' => Usuarios::get_by_id(1)]));

Router::get('home/{id}', fn () => view('users'));

Router::post('home', function ($request) {
  echo $request['name'];
  view('home');
});

Router::get('users', function () {
  view('users');
});

Router::get('login', function () {
  view('login');
});

Router::post('login', function ($request) {
  view('login');
});

Router::get('greet', fn () => UsuarioController::greet());

Router::get('componentes', function () {
  view('componentes.index');
});
