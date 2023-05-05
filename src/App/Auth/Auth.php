<?php

namespace App\Auth;

use App\Entities\UsuarioEntity;

class Auth
{
  public static function login(UsuarioEntity $usuario)
  {
    session_start();

    $_SESSION['id'] = $usuario->id;

    var_dump($_SESSION);
  }
}