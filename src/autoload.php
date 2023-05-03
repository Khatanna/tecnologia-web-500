<?php

spl_autoload_register(fn (string $class) => require_once("$class.php"));
