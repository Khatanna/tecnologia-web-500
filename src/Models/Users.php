<?php

namespace Models;

use Database\MySql;

class Users
{
  private static $db;
  private static $connection;
  public static function connect()
  {
    self::$db = MySql::get_instance();
    self::$connection  = self::$db->connection;
  }

  public static function all()
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Componentes");

    while ($row = mysqli_fetch_assoc($result)) {
      $componentes[] = $row;
    }

    return $componentes;
  }
}
