<?php

require_once('./src/autoload.php');
require_once('./config.php');

Config::load_config();

use App\Routing\Router;
use App\Controllers\ComponenteController;
use App\Controllers\UsuarioController;
use App\Auth\Auth;

function view(string $view_name, ?array $data = null, ?bool $redirect = false): void
{
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  function route(string $view_name, ?array $data = null): string
  {
    if (isset($data)) {
      foreach ($data as $key => $value) {
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

  if ($redirect) {
    header("location: $view_name");
  }

  require_once __DIR__ . $path;
}

Router::get('home', function() {
  if (Auth::auth()) {
    view('home');
  } else {
    view('login', redirect: true);
  }
});

Router::get('login', function() {
  if (Auth::auth()) {
    view('home', redirect: true);
  } else {
    view('login');
  }
});

Router::get('componentes', fn(int $page, ?string $search) => ComponenteController::index($page, $search));
Router::get('componentes/delete/{id}', fn(int $id) => ComponenteController::delete($id));
Router::get('componentes/{id}', fn(int $id) => ComponenteController::show($id));

Router::get('usuarios/form', function() {
  view('usuarios.form');
});

Router::post('usuarios', fn($request) => UsuarioController::create($request));
Router::post('usuarios/update/{id}', fn($request, int $id) => UsuarioController::update($request, $id));
Router::get('usuarios/{id}', fn(int $id) => UsuarioController::show($id));
Router::post('login', function($request) {
  extract($request);
  $usuario = new \App\Entities\UsuarioEntity(id: -1, nombre_de_usuario: $username, contraseña: $password);
  Auth::login($usuario);

  if (Auth::auth()) {
    view('home', ['message' => 'Inicio de sesión exitoso'], redirect: true);
  } else {
    view('login', ['message' => 'Error al iniciar sesión']);
  }
});

Router::post('logout', function() {
  Auth::logout();
  view('home', redirect: true);
});

