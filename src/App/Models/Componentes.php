<?php

namespace App\Models;

use App\Database\MySql;
use App\Entities\ComponenteEntity;
use App\Entities\UsuarioEntity;

class Componentes implements IOperaciones
{
  private static $connection;
  public static $count;

  public static function connect(): void
  {
    self::$connection = MySql::get_instance()->connection;
  }

  public static function all(?int $page = 1, ?string $search = null): array
  {
    self::connect();

    $offset = ($page - 1) * 10;
    if (isset($search)) {
      $query = "SELECT id_componente as id, codigo_componente as codigo, descripcion_componente as descripcion, imagen_componente as imagen FROM Componente WHERE codigo_componente LIKE '%$search%' LIMIT 10 OFFSET $offset";
    } else {
      $query = "SELECT id_componente as id, codigo_componente as codigo, descripcion_componente as descripcion, imagen_componente as imagen FROM Componente LIMIT 10 OFFSET $offset";
    }
    $result = mysqli_query(self::$connection, $query);
    $componentes = [];
    while ($row = mysqli_fetch_assoc($result)) {
      extract($row);
      $componentes[] = new ComponenteEntity(id: intval($id), imagen: $imagen, codigo: $codigo, descripcion: $descripcion);
    }

    if (isset($search)) {
      self::$count = mysqli_fetch_assoc(mysqli_query(self::$connection, "SELECT count(*) as count FROM componente WHERE codigo_componente LIKE '%$search%'"))['count'];
    } else {
      self::$count = mysqli_fetch_assoc(mysqli_query(self::$connection, "SELECT count(*) as count FROM componente"))['count'];
    }
    return $componentes;
  }

  public static function get_by_id(int $id): ComponenteEntity
  {
    self::connect();
    $result = mysqli_query(self::$connection, "SELECT id_componente as id, codigo_componente as codigo, descripcion_componente as descripcion, imagen_componente as imagen FROM Componente WHERE id_componente = $id");

    $row = mysqli_fetch_assoc($result);
    extract($row);
    $componente = new ComponenteEntity(id: intval($id), imagen: $imagen, codigo: $codigo, descripcion: $descripcion);

    return $componente;
  }

  public static function create(mixed $request): string
  {
  }

  public static function delete(int $id): string
  {
    self::connect();
    $result = mysqli_query(self::$connection, "DELETE FROM Componente WHERE id_componente = $id");
    $count = mysqli_fetch_assoc(mysqli_query(self::$connection, "SELECT count(*) as 'count' FROM Componente WHERE id_componente = 255"))['count'];

    if (intval($count) === 0 and $result) {
      return "Se elimino el componente con el id $id";
    }

    return "Ocurrio algun error";
  }
}