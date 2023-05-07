<?php

namespace App\Models;

use App\Entities\UsuarioEntity;

interface IOperaciones
{
    public static function all(): array;
    public static function get_by_id(int $id): UsuarioEntity;
    public static function create(mixed $request): string;
    public static function delete(int $id): string;
}
