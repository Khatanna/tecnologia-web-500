<?php
$path = "/tecnologia-web-500/src/App/Views/public/css/styles.css";
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <title>Componentes</title>
  <link rel="stylesheet" href="<?= $path ?>">

</head>
<body>
<h1>Componentes</h1>

<button class="btn btn-primary">Botón</button>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum magni mollitia odio omnis
        quos. Animi, autem dolores earum eos et officia officiis omnis porro, quis rem reprehenderit unde! Alias,
        quas.</p>
    </div>
  </div>
</div>

<div class="dropdown" data-bs-theme="light">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonLight" data-bs-toggle="dropdown" aria-expanded="false">
    Default dropdown
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLight">
    <li><a class="dropdown-item active" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>

<div class="dropdown" data-bs-theme="dark">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDark" data-bs-toggle="dropdown" aria-expanded="false">
    Dark dropdown
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
    <li><a class="dropdown-item active" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>

<li class="nav-item dropdown">
  <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center show" id="bd-theme" type="button" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (dark)">
    <svg class="bi my-1 theme-icon-active">
      <use href="#moon-stars-fill"></use>
    </svg>
    <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end show" aria-labelledby="bd-theme-text" data-bs-popper="static">
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
        <svg class="bi me-2 opacity-50 theme-icon">
          <use href="#sun-fill"></use>
        </svg>
        Light
        <svg class="bi ms-auto d-none">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
        <svg class="bi me-2 opacity-50 theme-icon">
          <use href="#moon-stars-fill"></use>
        </svg>
        Dark
        <svg class="bi ms-auto d-none">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
        <svg class="bi me-2 opacity-50 theme-icon">
          <use href="#circle-half"></use>
        </svg>
        Auto
        <svg class="bi ms-auto d-none">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
  </ul>
</li>

<script src="/tecnologia-web-500/src/App/views/public/js/bootstrap.min.js"></script>
<script>
    (() => {
        'use strict'

        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }

            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        const showActiveTheme = (theme, focus = false) => {
            const themeSwitcher = document.querySelector('#bd-theme')

            if (!themeSwitcher) {
                return
            }

            const themeSwitcherText = document.querySelector('#bd-theme-text')
            const activeThemeIcon = document.querySelector('.theme-icon-active use')
            const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
            const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

            document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                element.classList.remove('active')
                element.setAttribute('aria-pressed', 'false')
            })

            btnToActive.classList.add('active')
            btnToActive.setAttribute('aria-pressed', 'true')
            activeThemeIcon.setAttribute('href', svgOfActiveBtn)
            const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
            themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

            if (focus) {
                themeSwitcher.focus()
            }
        }

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (storedTheme !== 'light' || storedTheme !== 'dark') {
                setTheme(getPreferredTheme())
            }
        })

        window.addEventListener('DOMContentLoaded', () => {
            showActiveTheme(getPreferredTheme())

            document.querySelectorAll('[data-bs-theme-value]')
                .forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const theme = toggle.getAttribute('data-bs-theme-value')
                        localStorage.setItem('theme', theme)
                        setTheme(theme)
                        showActiveTheme(theme, true)
                    })
                })
        })
    })()
</script>
</body>

</html>
