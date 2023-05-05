<?php

namespace App\Tests\Helpers;
class Config
{
  public static function load_config()
  {
    $file = fopen(".env", "r") or die("Error: Variable of environment");
    $vars = explode("\n", fread($file, filesize(".env")));

    foreach ($vars as $var) {
      putenv(trim($var));
    }
  }
}
