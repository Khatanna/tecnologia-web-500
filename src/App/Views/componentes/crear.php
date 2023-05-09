<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php require_once sprintf("%s/..\components\head.php", __DIR__) ?>
  <title>Crear componente</title>
</head>
<body>
<main class="container-fluid text-white-50 theme">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">
    <div class="col-12 col-sm-10 col-lg-5">
      <form action="/tecnologia-web-500/componentes" class="row g-3" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="codigo" class="form-label">Codigo: </label>
          <input type="text" autocomplete="off" class="form-control" name="codigo" id="codigo">
          <div class="invalid-feedback">
            <small><small>Debe completar este campo</small></small>
          </div>
        </div>
        <div class="col-md-6">
          <label for="familia" class="form-label">Familia: </label>
          <select name="" id="" class="form-control">
            <option value="">
              TLL
            </option>
            <option value="">CMOS</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="tipo" class="form-label">Tipo: </label>
          <select name="" id="" class="form-control">
            <option value="">AND</option>
            <option value="">OR</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="tipo" class="form-label">Imagen: </label>
          <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <div class="col-md-12">
          <label for="descripcion" class="form-label">Descripción: </label>
          <textarea name="descripcion" id="descripcion" rows="3" class="form-control"></textarea>
        </div>

        <div class="col-12">
          <button class="btn btn-outline-success" type="submit">crear componente
          </button>
        </div>
      </form>
    </div>
  </div>
</main>

<?php require_once sprintf("%s/..\components\script.php", __DIR__) ?>
<script>
    theme.addEventListener('click', () => {
        theme.innerText = "";
        if (theme.className === "bi bi-brightness-high-fill") {
            theme.className = "bi bi-moon-fill";
        } else {
            theme.className = "bi bi-brightness-high-fill";
        }
    })
</script>
</body>
</html>