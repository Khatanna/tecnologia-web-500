<?php

namespace App\Entities;

class UsuarioEntity
{
  public int $id;
  public string $nombre_de_usuario;
  public string $contraseña;

  public function __construct(int $id, string $nombre_de_usuario, string $contraseña)
  {
    $this->id = $id;
    $this->nombre_de_usuario = $nombre_de_usuario;
    $this->contraseña = $contraseña;
  }
}
