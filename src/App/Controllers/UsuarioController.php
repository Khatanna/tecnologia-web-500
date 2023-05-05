<?php

namespace App\Controllers;

class UsuarioController
{
  public static function greet()
  {
    view('login', ["name" => "charlie"]);
  }
}