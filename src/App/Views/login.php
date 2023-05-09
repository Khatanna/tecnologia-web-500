<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php require_once sprintf("%s/\components\head.php", __DIR__) ?>
  <title>Login</title>
</head>

<body>

<?php if (isset($message)) : ?>
  <div class="toast position-absolute top-0 start-50 translate-middle-x show border border-light mt-4" role="alert" aria-live="assertive" aria-atomic="false">
    <div class="toast-header bg-dark text-white theme">
      <strong class="me-auto">Mensaje de sesión</strong>
      <button type="button" class="btn btn-outline-danger theme px-2 py-0" data-bs-dismiss="toast" aria-label="Close">
        x
      </button>
    </div>
    <div class="toast-body border boder-light text-success">
      <?= $message ?>
    </div>
  </div>
<?php endif; ?>
<main class="container-fluid">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">
    <div class="col-11">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-4 text-center">
          <h1 style="
                  font-size: 3.3rem;
                " id="title" class="mb-4">
            Inicio de sesión
          </h1>
          <form action="<?= route('login') ?>" novalidate class="row g-3 needs-validation" enctype="multipart/form-data" method="POST">
            <div>
              <input type="text" name="username" id="username" class="form-control" required autocomplete="off" placeholder="Nombre de usuario">
              <div class="invalid-feedback">
                <small><small>Debe completar este campo</small></small>
              </div>
            </div>
            <div>
              <input type="password" name="password" id="username" class="form-control" required autocomplete="off" placeholder="Contraseña">
              <div class="invalid-feedback">
                <small><small>Debe completar este campo</small></small>
              </div>
            </div>
            <a href="usuarios/form" class="text-decoration-none float-start">Registrarse</a>
            <button class="btn btn-outline-success float-end" type="submit">Iniciar sesión
            </button>
            <small>
              <b>Modo oscuro:</b>
              <div href="" class="text-primary text-decoration-none d-inline" role="button" id="theme" data-bs-theme-value="dark">
                activado
              </div>
            </small>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once sprintf("%s/\components\script.php", __DIR__) ?>
</body>

</html>