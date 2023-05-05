<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <?php require_once sprintf("%s/\components\head.php", __DIR__) ?>
  <title>Home</title>

  <style>
      * {
          /*outline: 1px solid red;*/
      }
  </style>
</head>

<body>
<div class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container">
    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">
            <img src="https://eispdm.com/public/imagenes/logo_eispdm.png" alt="Logo" width="30">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar componentes..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</div>
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