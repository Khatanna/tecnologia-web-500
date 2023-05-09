<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <?php require_once sprintf("%s/..\components\head.php", __DIR__) ?>
  <style>
      #search:focus-visible {
          outline: none;
      }

      i {
          font-size: 1.7rem;
          cursor: pointer;
          margin-right: 1.1rem;
      }

      i:hover {
          color: #ffd900
      }

      .codigo {
          text-decoration: none;
      }

      .codigo:hover {
          text-decoration: underline;
      }
  </style>
  <title>Componentes</title>
</head>
<body>
<?php if (isset($message)) : ?>
  <div class="toast position-absolute top-0 start-50 translate-middle z-3 show border border-light mt-4" role="alert" aria-live="assertive" aria-atomic="false">
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

<nav class="nav navbar-expand-lg bg-body-tertiary border-bottom top-0 position-sticky">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse py-1" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item me-5 fs-4"><a href="/tecnologia-web-500/home" class="text-decoration-none">Component
            finder</a></li>
        <li class="nav-item">
          <div class="d-flex flex-row rounded-pill py-1 align-items-center border border-light-subtle">
            <div class="w-100">
              <form action="componentes" class="d-flexblack px-3" method="GET">
                <input type="text" class="w-100 border-0 h-100 m-0 p-1 bg-body-tertiary" name="search" autocomplete="off" id="search" placeholder="Buscar componentes..."/>
              </form>
            </div>
            <i class="bi bi-search" style="font-size: 1.3rem"></i>
          </div>
        </li>
      </ul>
      <i class="bi bi-brightness-high-fill" role="button" id="theme" data-bs-theme-value="dark"></i>
      <div class="dropdown">
        <i href="#" class="bi bi-person-circle" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>

        <ul class="dropdown-menu">
          <li><a class="bi bi-gear dropdown-item" href="usuarios/<?= \App\Auth\Auth::user()->id ?>">
              <div class="float-end">Perfil</div>
            </a></li>
          <li>
            <form action="logout" method="POST">
              <button class="bi bi-box-arrow-left dropdown-item" href="#" type="submit" role="button">
                <div class="float-end">Cerrar sesión</div>
              </button>
            </form>
          </li>
          <li>
            <a class="bi bi-plus-circle dropdown-item" href="/tecnologia-web-500/componentes/crear">
              <div class="float-end"><small><small>Crear componente</small></small></div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<main class="container-fluid mt-3">
  <div class="row justify-content-center">
    <div class="col-5">
      <?php foreach ($componentes as $componente): ?>
        <div class="d-flex flex-row align-items-center mb-1">
          <a class="text-decoration-none text-body-secondary" href="componentes/<?= $componente->id ?>">
            <div class="d-flex flex-row">
              <div class="py-2">
                <img src="data:image/*;charset=utf-8;base64,<?= $componente->imagen ?>" alt="<?= $componente->codigo ?>" width="30" class="rounded rounded-circle me-2"/>
              </div>
              <div class="d-flex flex-column">
                <small><small>Componentes/<b><?= $componente->codigo ?></b></small></small>
                <small><small>https://www.tecnologia-web-500/componentes/<?= $componente->id ?>.com</small></small>
              </div>
            </div>
          </a>
          <?php if (\App\Auth\Auth::user()->rol === 'administrador'): ?>
            <div class="dropdown position-relative mt-1">
              <i class="bi bi-three-dots-vertical position-absolute bottom-0 start-0 role=" button"
              data-bs-toggle="dropdown"
              aria-expanded="false" style="font-size: 1rem"></i>

              <ul class="dropdown-menu">
                <li>
                  <a href="componentes/delete/<?= $componente->id ?>">
                    <button class="bi bi-trash dropdown-item" href="#" type="submit" role="button">
                      <div class="float-end">Borrar</div>
                    </button>
                  </a>
                </li>
                <li><a class="bi bi-pencil-square dropdown-item" href="/tecnologia-web-500/componentes/actualizar">
                    <div class="float-end">Editar</div>
                  </a></li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <a class="codigo" href="componentes/<?= $componente->id ?>"><?= $componente->codigo ?></a>
          <div><?= $componente->descripcion ?></div>
        </div>
      <?php endforeach; ?>
      <div aria-label="Page navigation example">
        <ul class="pagination pagination-sm">
          <?php if ($page === 1): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $pages ?><?= isset($search) ? '&search=' . $search : '' ?>">Anterior</a>
            </li>
          <?php else: ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page - 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">Anterior</a>
            </li>
          <?php endif; ?>
          <?php for ($i = $page - 1; $i < $page + 10; $i++) : ?>
            <?php if ($i < $pages): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $i + 1 ?><?= isset($search) ? '&search=' . $search : '' ?>"><?= $i + 1 ?></a>
              </li>
            <?php endif ?>
          <?php endfor; ?>
          <?php if ($page == $pages): ?>
            <li class="page-item"><a class="page-link" href="?page=1<?= isset($search) ? '&search=' . $search : '' ?>">Siguiente</a>
            </li>
          <?php else: ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page + 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">Siguiente</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <div class="col-3"></div>
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