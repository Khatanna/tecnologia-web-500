<?php

namespace App\Entities;

class UsuarioEntity
{
  public int $id;

  public function __construct(int $id)
  {
    $this->id = $id;
  }
}