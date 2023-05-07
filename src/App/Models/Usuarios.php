<?php

namespace App\Models;

use App\Database\MySql;
use App\Entities\UsuarioEntity;

class Usuarios implements IOperaciones
{
  private static $connection;
  public static function connect()
  {
    self::$connection = MySql::get_instance()->connection;
  }

  public static function disconnect()
  {
    mysqli_close(self::$connection);
  }
  public static function all(): array
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios");
    mysqli_commit(self::$connection);
    return mysqli_fetch_all($result);
  }

  public static function get_by_id(int $id): UsuarioEntity
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios WHERE id = $id");
    mysqli_commit(self::$connection);

    $row = mysqli_fetch_assoc($result);
    $user = new UsuarioEntity($row['id'], $row['nombre_de_usuario'], $row['contraseña']);

    return $user;
  }

  public static function create(mixed $request): string
  {
    return "";
  }

  public static function delete(int $id): string
  {
    return "";
  }
}
