<?php

namespace App\Controllers;

use App\Models\Usuarios;

class UsuarioController
{
  public static function create($request)
  {
    $message = Usuarios::create($request);
    view('usuarios.form', ['message' => $message]);
  }

  public static function show(int $id)
  {
    view('usuarios.show', ['usuario' => Usuarios::get_by_id($id)]);
  }

  public static function update($request, int $id)
  {
    $message = Usuarios::update($request, $id);

    view('usuarios.show', ['message' => $message, 'usuario' => Usuarios::get_by_id($id)]);
  }
}