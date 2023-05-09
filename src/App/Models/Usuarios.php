<?php

namespace App\Models;

use App\Database\MySql;
use App\Entities\UsuarioEntity;

class Usuarios implements IOperaciones
{
  private static $connection;

  public static function connect(): void
  {
    self::$connection = MySql::get_instance()->connection;
  }

  public static function disconnect()
  {
    mysqli_close(self::$connection);
  }

  public static function all(?int $page = null): array
  {
    self::connect();

    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios");
    $usuarios = [];
    mysqli_commit(self::$connection);

    while ($row = mysqli_fetch_assoc($result)) {
      extract($row);
      $usuarios[] = new UsuarioEntity($id, $nombre_de_usuario, $contraseña);
    }
    return $usuarios;
  }

  public static function get_by_id(int $id): UsuarioEntity
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios WHERE id = $id");
    mysqli_commit(self::$connection);

    $row = mysqli_fetch_assoc($result);
    $user = new UsuarioEntity($row['id'], $row['ci'], $row['nombre_de_usuario'], $row['contraseña'], $row['rol'], $row['nombres'], $row['apellido_paterno'], $row['apellido_materno']);

    return $user;
  }

  public static function get_by_username(string $username): ?UsuarioEntity
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT * FROM Usuarios WHERE nombre_de_usuario = '$username'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row)) {
      $user = new UsuarioEntity($row['id'], $row['nombre_de_usuario'], $row['contraseña'], $row['rol']);
    }

    return $user ?? null;
  }

  public static function create(mixed $request): string
  {
    self::connect();
    extract($request);
    $username_result = mysqli_query(self::$connection, "SELECT count(*) as count FROM Usuarios WHERE nombre_de_usuario = '$nombre_de_usuario' OR ci = '$ci';");
    $count_username = mysqli_fetch_assoc($username_result)['count'];

    if ($count_username > 0) {
      return "Este usuario ya existe";
    }
    $result = mysqli_query(self::$connection, "INSERT INTO Usuarios (ci, nombres, apellido_paterno, apellido_materno, nombre_de_usuario, contraseña, rol) VALUES ('$ci', '$nombres', '$apellido_paterno', '$apellido_materno', '$nombre_de_usuario', '$contraseña', 'usuario');");

    if ($result) {
      return "Registro exitoso";
    }

    return "Error en el registro";
  }

  public static function delete(int $id): string
  {
    return "";
  }

  public static function update($request, int $id): string
  {
    self::connect();
    extract($request);
    $usuario = mysqli_query(self::$connection, "UPDATE Usuarios set ci='$ci', nombres='$nombres', apellido_paterno = '$apellido_paterno', apellido_materno='$apellido_materno', contraseña='$contraseña' WHERE id = $id");

    return "Se actualizo el usuario";
  }
}
