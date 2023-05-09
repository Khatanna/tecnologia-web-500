<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <?php require_once sprintf("%s/\components\head.php", __DIR__) ?>
  <title>Home</title>
  <style>
      #search:focus-visible {
          outline: none;
      }

      a:hover {
          outline: 1pt solid rgba(255, 255, 255, 0.4);
      }

      a[class~="text-black"]:hover {
          outline: 1pt solid rgba(0, 0, 0, 0.4);
      }
  </style>
</head>

<body>
<?php if (isset($message)) : ?>
  <div class="toast position-absolute top-0 start-50 translate-middle-x show border border-light mt-4" role="alert" aria-live="assertive" aria-atomic="false">
    <div class="toast-header">
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
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center">
          <h1 style="
                  font-size: 3.3rem;
                  letter-spacing: -4px;
                " id="title">
            <div class="d-inline">
              <span class="letter"><b>D</b></span>
              <span class="letter"><b>e</b></span>
              <span class="letter"><b>v</b></span>
              <span class="letter"><b>i</b></span>
              <span class="letter"><b>c</b></span>
              <span class="letter"><b>e</b></span>
              <span class="letter"><b>s</b></span>
            </div>
            <div class="mx-2 d-inline"></div>
            <div class="d-inline">
              <span class="letter"><b>F</b></span>
              <span class="letter"><b>i</b></span>
              <span class="letter"><b>n</b></span>
              <span class="letter"><b>d</b></span>
              <span class="letter"><b>e</b></span>
              <span class="letter"><b>r</b></span>
            </div>
          </h1>
        </div>
      </div>
      <div class="row justify-content-center my-3">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 rounded-pill py-1 d-flex flex-row align-items-center border border-light-subtle">
          <div style="width: min-content" class="text-center fs-5 me-2">
            🔍
          </div>
          <div class="w-100">
            <form action="" class="d-flexblack" method="GET">
              <input type="text" class="w-100 border-0 h-100 m-0 p-1 bg-body" name="query" autocomplete="off" id="search"/>
            </form>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center">
          <a class="btn rounded-1 btn-sm border-1" href="componentes?page=1" role="button">
            Componentes
          </a>
          <a class="btn rounded-1 btn-sm border-1" href="familias" role="button">
            Familias
          </a>
        </div>
      </div>
      <div class="row justify-content-center mt-2">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center">
          <small>
            <b>Modo oscuro:</b>
            <div href="" class="text-primary text-decoration-none d-inline" role="button" id="theme" data-bs-theme-value="dark">
              activado
            </div>
          </small>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once sprintf("%s/\components\script.php", __DIR__) ?>
</body>

</html>