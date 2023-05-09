<?php

namespace App\Models;

interface IOperaciones
{
  public static function connect(): void;

  public static function all(?int $page = null): array;

  public static function get_by_id(int $id);

  public static function create(mixed $request): string;

  public static function delete(int $id): string;
}
