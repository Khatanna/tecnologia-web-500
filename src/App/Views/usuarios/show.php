<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <?php require_once sprintf("%s/..\components\head.php", __DIR__) ?>
  <title>Perfil <?= $usuario->nombre_de_usuario ?></title>
</head>
<body>

<div class="position-absolute top-0 left-0">
  <a class="page-link fs-2 cursor-pointer px-4 rounded-pill m-2" href="/tecnologia-web-500/home">⬅</a>
</div>

<?php if (isset($message)): ?>
  <div class="toast position-absolute top-0 start-50 translate-middle-x show border border-light mt-4" role="alert" aria-live="assertive" aria-atomic="false">
    <div class="toast-header">
      <strong class="me-auto">Mensaje de actualización</strong>
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
    <div class="col-12 col-sm-10 col-lg-5">
      <h4 class="text-center">Perfil de (<?= $usuario->nombre_de_usuario ?>)</h4>
      <form method="POST" class="needs-validation row g-3" action="update/<?= $usuario->id ?>" novalidate>
        <div class="col-md-6">
          <label for="nombres" class="form-label">
            Nombres:
          </label>
          <input type="text" name="nombres" id="nombres" class="form-control" autocomplete="off" required value="<?= $usuario->nombres ?>">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>
        <div class="col-md-6">
          <label for="ci" class="form-label">
            Carnet de identidad:
          </label>
          <input type="text" name="ci" id="ci" class="form-control" autocomplete="off" required value="<?= $usuario->ci ?>">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>
        <div class="col-md-6">
          <label for="apellido_paterno" class="form-label">
            Apellido paterno:
          </label>
          <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" autocomplete="off" required value="<?= $usuario->apellido_paterno ?>">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>
        <div class="col-md-6">
          <label for="apellido_materno" class="form-label">
            Apellido materno:
          </label>
          <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" autocomplete="off" required value="<?= $usuario->apellido_materno ?>">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>
        <div class="col-md-6">
          <label for="nombre_de_usuario" class="form-label">
            Nombre de usuario:
          </label>
          <input type="text" name="nombre_de_usuario" id="nombre_de_usuario" class="form-control" autocomplete="off" required value="<?= $usuario->nombre_de_usuario ?>" disabled>
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>

        <div class="col-md-6">
          <label for="contraseña" class="form-label">
            Contraseña:
          </label>
          <input type="password" name="contraseña" id="contraseña" class="form-control" autocomplete="off" required value="<?= $usuario->contraseña ?>">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>

        <div class="col-md-12">
          <label for="confirmar_contraseña" class="form-label">
            Confirmar contraseña:
          </label>
          <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" class="form-control" autocomplete="off" required>
          <div id="invalid_password" style="display: none">
            <small><small>Las contraseñas deben coincidir</small></small>
          </div>
        </div>

        <div class="col-12">
          <button class="btn btn-success" type="submit">Registrarse
          </button>
        </div>
      </form>
    </div>
  </div>
</main>

<?php require_once sprintf("%s/..\components\script.php", __DIR__) ?>
<script>
    const forms = document.querySelectorAll('.needs-validation')
    const inputPassword = document.getElementById('contraseña');
    const confirmInputPassword = document.getElementById('confirmar_contraseña');
    const invalid_password = document.getElementById('invalid_password');
    confirmInputPassword.addEventListener('keyup', (e) => {
        console.log({
            a: inputPassword.value, b: confirmInputPassword.value
        })
        const isValidPassword = (a, b) => a === b ? 'none' : 'block';
        const isValid = isValidPassword(inputPassword.value, confirmInputPassword.value);

        console.log({isValid});
        invalid_password.style.display = isValid;
        invalid_password.style.color = "#f00";
    })
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {


            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
</script>
</body>
</html>





