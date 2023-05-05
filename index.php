<?php

require_once('./src/autoload.php');
require_once('./config.php');

Config::load_config();

use App\Routing\Router;
use App\Auth\Auth;
use App\Entities\UsuarioEntity;
use App\Controllers\UsuarioController;

function view($view_name): void
{
  require_once __DIR__ . "\\src\\App\\views\\$view_name.php";
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