<?php

namespace Database;

class MySql
{
  private static ?self $instance = null;
  public $connection;
  private function __construct()
  {
    $hostname = getenv('DATABASE_HOST');
    $username = getenv('DATABASE_USER');
    $password = getenv('DATABASE_PASSWORD');
    $database = getenv('DATABASE_NAME');
    $port = getenv('DATABASE_PORT');

    $this->connection = mysqli_connect($hostname, $username, $password, $database, $port);
  }

  public static function get_instance(): self
  {
    if (self::$instance == null) {
      self::$instance = new static();
    }

    return self::$instance;
  }
}
