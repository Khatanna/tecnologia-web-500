<?php

namespace App\Entities;

class ComponenteEntity
{
  public int $id;
  public string $codigo;
  public ?string $imagen;
  public string $descripcion;
  public ?int $id_familia;
  public ?int $id_tipo;

  public function __construct(int $id, string $codigo, ?string $imagen = null, string $descripcion, ?int $id_familia = null, ?int $id_tipo = null)
  {
    $this->id = $id;
    $this->codigo = $codigo;
    $this->imagen = $imagen ?? '';
    $this->descripcion = $descripcion;
    $this->id_familia = $id_familia ?? 1;
    $this->id_tipo = $id_tipo ?? 1;
  }
}