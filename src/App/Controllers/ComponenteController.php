<?php

namespace App\Controllers;

use App\Models\Componentes;
use App\Models\Usuarios;

class ComponenteController
{
  public static function index(?int $page = 1, ?string $search, ?string $message = null)
  {
    $componentes = Componentes::all($page, $search);
    $pages = floor((Componentes::$count ?? 1) / 10) + 1;
    view('componentes.index', ['componentes' => $componentes, 'page' => $page, 'pages' => $pages, 'search' => $search, 'message' => $message]);
  }

  public static function show($id)
  {
    view('componentes.show', ['componente' => Componentes::get_by_id($id)]);
  }

  public static function delete(int $id)
  {
    self::index(1, null, Componentes::delete($id));
  }
}