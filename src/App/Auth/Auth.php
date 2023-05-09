<?php

namespace App\Auth;

use App\Entities\UsuarioEntity;
use App\Models\Usuarios;

if (session_status() == PHP_SESSION_DISABLED || session_status() == PHP_SESSION_NONE) {
  session_start();
}

class Auth
{
  public static function login(UsuarioEntity $usuario)
  {
    $target = Usuarios::get_by_username($usuario->nombre_de_usuario);
    if (isset($target)) {
      if ($usuario->contraseña === $target->contraseña) {
        if (!isset($_SESSION['usuario'])) {
          $_SESSION['usuario'] = ['id' => $target->id, 'rol' => $target->rol];
        }
      }
    }
  }

  public static function logout()
  {
    if (isset($_SESSION['usuario'])) {
      session_destroy();
    }
  }

  public static function auth(): bool
  {
    return session_status() == PHP_SESSION_ACTIVE and isset($_SESSION['usuario']['id']);
  }

  public static function user(): UsuarioEntity
  {
    extract($_SESSION);
    $usuario = Usuarios::get_by_id($usuario['id']);

    return $usuario;
  }
}