<?php
function get_prop(string $key)
{
  if (isset($GLOBALS[$key])) {
    return $GLOBALS[$key];
  }

  return "No existe esta variable";
}

?>
<!doctype html>
<html lang="en">
<head>
  <?php require_once sprintf("%s/\components\head.php", __DIR__) ?>
  <title>Login</title>
</head>
<body>
<h1><?= get_prop('name') ?></h1>
<h1><?= get_prop('last_name') ?></h1>
</body>
</html>
