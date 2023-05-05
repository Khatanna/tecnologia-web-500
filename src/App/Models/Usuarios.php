<?php

namespace App\Models;

use App\Database\MySql;

class Usuarios
{
  private static $connection;
  public static function connect()
  {
    self::$connection = MySql::get_instance()->connection;
  }

  public static function disconnect() {
    mysqli_close(self::$connection);
  }
  public static function all(): array
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios");
    mysqli_commit(self::$connection);
    return mysqli_fetch_all($result);
  }

  public static function get_user_by_id(int $id) {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios WHERE id = $id");
    mysqli_commit(self::$connection);
    return mysqli_fetch_assoc($result);
  }
}
