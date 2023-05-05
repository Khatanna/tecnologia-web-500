<?php
namespace App\Tests;
use App\Models\Usuarios;
use PHPUnit\Framework\TestCase;
use App\Tests\Helpers\Config;

Config::load_config();
class UsuariosTest extends TestCase {
  public function test_should_be_array_to_response_of_users_model() {
    $usuarios = Usuarios::all();
    $this->assertIsArray($usuarios);
  }
  public function test_should_be_return_a_unique_user_with_id () {
    $usuario = Usuarios::get_user_by_id(1);
    $this->assertArrayHasKey('id', $usuario);
  }
}