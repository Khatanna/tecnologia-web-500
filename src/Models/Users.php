<?php

namespace Models;

use Database\MySql;

class Users
{
  private static $connection;
  public static function connect()
  {
    self::$connection = MySql::get_instance()->connection;
  }
  public static function all(): array
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Componentes");
    return mysqli_fetch_all($result);
  }
}
