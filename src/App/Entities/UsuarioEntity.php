<?php

namespace App\Entities;

class UsuarioEntity
{
  public ?int $id;
  public ?string $ci;
  public string $nombre_de_usuario;
  public string $contraseña;
  public ?string $rol;
  public ?string $nombres;
  public ?string $apellido_paterno;
  public ?string $apellido_materno;

  public function __construct(?int $id = null, ?string $ci = null, string $nombre_de_usuario, string $contraseña, ?string $rol = null, ?string $nombres = null, ?string $apellido_paterno = null, ?string $apellido_materno = null)
  {
    $this->id = $id ?? -1;
    $this->ci = $ci;
    $this->nombre_de_usuario = $nombre_de_usuario;
    $this->contraseña = $contraseña;
    $this->rol = $rol;
    $this->nombres = $nombres;
    $this->apellido_paterno = $apellido_paterno;
    $this->apellido_materno = $apellido_materno;
  }
}
