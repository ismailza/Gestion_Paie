<?php require_once '../CONFIG.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,700|Mukta:500,700" rel="stylesheet">
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  <link rel="stylesheet" href="css/landing.css">
  <style>
  button.feature {
    border: 0;
    margin: 5px;
  }
  </style>
</head>

<body class="is-boxed has-animations">
  <div class="body-wrap boxed-container">
    <header class="site-header">
      <div class="container">
        <div class="site-header-inner">
          <div class="brand header-brand">
            <h1 class="m-0">
              <a href="">
                <img src="images/logo1.svg" alt="logo">
              </a>
            </h1>
          </div>
        </div>
      </div>
    </header>

    <main>
      <section class="hero">
        <div class="container">
          <div class="hero-inner">
            <div class="hero-copy">
              <h1 class="hero-title h2-mobile mt-0 is-revealing">Bienvenue dans JI2A Platforme</h1>
              <p class="hero-paragraph is-revealing">
                Espace pour les services destinés aux employés et responsables de JI2A.
              </p>
              <p class="hero-cta is-revealing">
                <a href="login" class="button button-primary button-shadow">Se connecter</a>
              </p>
            </div>
            <div class="hero-illustration is-revealing">
              <svg width="528" height="413" viewBox="0 0 528 413" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient x1="50%" y1="100%" x2="50%" y2="0%" id="hero-illustration-a">
                    <stop stop-color="#A7FDE8" stop-opacity="0" offset="0%" />
                    <stop stop-color="#6EFACC" offset="100%" />
                  </linearGradient>
                  <linearGradient x1="100%" y1="50%" x2="0%" y2="50%" id="hero-illustration-b">
                    <stop stop-color="#FF4F7A" stop-opacity="0" offset="0%" />
                    <stop stop-color="#FF4F7A" offset="100%" />
                  </linearGradient>
                  <radialGradient fx="50%" fy="50%" r="100%" id="hero-illustration-c">
                    <stop stop-color="#6EFACC" offset="0%" />
                    <stop stop-color="#6EFACC" stop-opacity="0" offset="100%" />
                  </radialGradient>
                  <linearGradient x1="0%" y1="100%" y2="0%" id="hero-illustration-d">
                    <stop stop-color="#007CFE" stop-opacity="0" offset="0%" />
                    <stop stop-color="#007DFF" offset="100%" />
                  </linearGradient>
                  <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="hero-illustration-e">
                    <stop stop-color="#FF4F7A" stop-opacity="0" offset="0%" />
                    <stop stop-color="#FF4F7A" offset="100%" />
                  </linearGradient>
                  <filter x="-500%" y="-500%" width="1000%" height="1000%" filterUnits="objectBoundingBox"
                    id="dropshadow-1">
                    <feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter" />
                    <feGaussianBlur stdDeviation="24" in="shadowOffsetOuter" result="shadowBlurOuter" />
                    <feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0" in="shadowBlurOuter" />
                  </filter>
                </defs>
                <g transform="translate(0 -1)" fill="none" fill-rule="evenodd">
                  <g transform="translate(128 290)" fill="url(#hero-illustration-a)">
                    <path
                      d="M62.225 0l1.415 1.414L1.414 63.64 0 62.225zM66.468 4.243l1.414 1.414L5.657 67.882l-1.414-1.414zM70.71 8.485L72.126 9.9 9.899 72.125 8.485 70.71zM74.953 12.728l1.415 1.414-62.226 62.226-1.414-1.415zM79.196 16.97l1.414 1.415L18.385 80.61l-1.414-1.414zM83.439 21.213l1.414 1.414-62.226 62.226-1.414-1.414zM87.681 25.456l1.414 1.414L26.87 89.095l-1.414-1.414zM91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414z" />
                    <path
                      d="M91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414zM96.167 33.941l1.414 1.414-62.226 62.226-1.414-1.414zM100.41 38.184l1.413 1.414-62.225 62.225-1.414-1.414zM104.652 42.426l1.414 1.415-62.225 62.225-1.415-1.414zM108.894 46.669l1.415 1.414-62.226 62.226-1.414-1.415zM113.137 50.912l1.414 1.414-62.225 62.225-1.414-1.414zM117.38 55.154l1.414 1.415-62.225 62.225-1.415-1.414zM121.622 59.397l1.415 1.414-62.226 62.226-1.414-1.415z" />
                    <g>
                      <path
                        d="M100.811 0l-1.414 1.414 62.225 62.226 1.415-1.415zM96.569 4.243l-1.415 1.414 62.226 62.225 1.414-1.414zM92.326 8.485L90.912 9.9l62.225 62.226 1.414-1.414zM88.083 12.728l-1.414 1.414 62.225 62.226 1.415-1.415zM83.84 16.97l-1.414 1.415 62.226 62.225 1.414-1.414zM79.598 21.213l-1.414 1.414 62.225 62.226 1.414-1.414zM75.355 25.456l-1.414 1.414 62.226 62.225 1.414-1.414zM71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414z" />
                      <path
                        d="M71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414zM66.87 33.941l-1.414 1.414 62.225 62.226 1.414-1.414zM62.627 38.184l-1.414 1.414 62.226 62.225 1.414-1.414zM58.385 42.426l-1.414 1.415 62.225 62.225 1.414-1.414zM54.142 46.669l-1.414 1.414 62.225 62.226 1.415-1.415zM49.9 50.912l-1.415 1.414 62.226 62.225 1.414-1.414zM45.657 55.154l-1.414 1.415 62.225 62.225 1.414-1.414zM41.414 59.397L40 60.811l62.225 62.226 1.415-1.415z" />
                    </g>
                  </g>
                  <g transform="matrix(1 0 0 -1 326 124)" fill="url(#hero-illustration-a)">
                    <path
                      d="M62.225 0l1.415 1.414L1.414 63.64 0 62.225zM66.468 4.243l1.414 1.414L5.657 67.882l-1.414-1.414zM70.71 8.485L72.126 9.9 9.899 72.125 8.485 70.71zM74.953 12.728l1.415 1.414-62.226 62.226-1.414-1.415zM79.196 16.97l1.414 1.415L18.385 80.61l-1.414-1.414zM83.439 21.213l1.414 1.414-62.226 62.226-1.414-1.414zM87.681 25.456l1.414 1.414L26.87 89.095l-1.414-1.414zM91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414z" />
                    <path
                      d="M91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414zM96.167 33.941l1.414 1.414-62.226 62.226-1.414-1.414zM100.41 38.184l1.413 1.414-62.225 62.225-1.414-1.414zM104.652 42.426l1.414 1.415-62.225 62.225-1.415-1.414zM108.894 46.669l1.415 1.414-62.226 62.226-1.414-1.415zM113.137 50.912l1.414 1.414-62.225 62.225-1.414-1.414zM117.38 55.154l1.414 1.415-62.225 62.225-1.415-1.414zM121.622 59.397l1.415 1.414-62.226 62.226-1.414-1.415z" />
                    <g>
                      <path
                        d="M100.811 0l-1.414 1.414 62.225 62.226 1.415-1.415zM96.569 4.243l-1.415 1.414 62.226 62.225 1.414-1.414zM92.326 8.485L90.912 9.9l62.225 62.226 1.414-1.414zM88.083 12.728l-1.414 1.414 62.225 62.226 1.415-1.415zM83.84 16.97l-1.414 1.415 62.226 62.225 1.414-1.414zM79.598 21.213l-1.414 1.414 62.225 62.226 1.414-1.414zM75.355 25.456l-1.414 1.414 62.226 62.225 1.414-1.414zM71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414z" />
                      <path
                        d="M71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414zM66.87 33.941l-1.414 1.414 62.225 62.226 1.414-1.414zM62.627 38.184l-1.414 1.414 62.226 62.225 1.414-1.414zM58.385 42.426l-1.414 1.415 62.225 62.225 1.414-1.414zM54.142 46.669l-1.414 1.414 62.225 62.226 1.415-1.415zM49.9 50.912l-1.415 1.414 62.226 62.225 1.414-1.414zM45.657 55.154l-1.414 1.415 62.225 62.225 1.414-1.414zM41.414 59.397L40 60.811l62.225 62.226 1.415-1.415z" />
                    </g>
                  </g>
                  <path d="M0 0h528v414H0z" />
                  <path fill="#FFF" d="M0 63h528v297H0z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)" />
                  <path fill="#FFF" d="M0 63h528v297H0z" />
                  <path fill="url(#hero-illustration-b)" d="M408 230h80v48h-80z" />
                  <path
                    d="M0 0h4v4H0V0zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zM12 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM24 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM36 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM48 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM60 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4z"
                    transform="rotate(45 -118.861 431.981)" fill="url(#hero-illustration-c)" />
                  <path fill="#FFF" d="M288 254h160v160H288z"
                    style="mix-blend-mode:multiply;filter:url(#dropshadow-1)" />
                  <path fill="#FFF" d="M288 254h160v160H288z" />
                  <path d="M248 79h88v24c0 35.346-28.654 64-64 64h-24V79z" fill="url(#hero-illustration-d)" />
                  <path d="M348 132c0 26.51-21.49 48-48 48 0-26.51 21.49-48 48-48z" fill="url(#hero-illustration-e)"
                    transform="matrix(1 0 0 -1 0 312)" />
                  <path fill="#FFF" d="M200 31h88v88h-88z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)" />
                  <path fill="#FFF" d="M200 31h88v88h-88z" />
                  <path fill="#F6F8FA" d="M24 248l88 88H24z" />
                  <rect fill="url(#hero-illustration-d)" x="335" y="242" width="32" height="32" rx="16" />
                </g>
              </svg>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="text-center text-white fixed-bottom" style="background-color: #1A237E; padding: 20px 5px 5px 5px;">
      <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2023 JI2A. All rights reserved.</small>
    </footer>

  </div>

  <script>
  ! function() {
    const e = document.documentElement;
    if (e.classList.remove("no-js"), e.classList.add("js"), document.body.classList.contains("has-animations")) {
      const e = window.sr = ScrollReveal();
      e.reveal(".hero-title, .hero-paragraph, .hero-cta", {
          duration: 1e3,
          distance: "40px",
          easing: "cubic-bezier(0.5, -0.01, 0, 1.005)",
          origin: "left",
          interval: 150
        }),
        e.reveal(".hero-illustration", {
          duration: 1e3,
          distance: "40px",
          easing: "cubic-bezier(0.5, -0.01, 0, 1.005)",
          origin: "right",
          interval: 150
        }),
        document.querySelectorAll(".pricing-table").forEach(i => {
          const t = [].slice.call(i.querySelectorAll(".pricing-table-header")),
            a = [].slice.call(i.querySelectorAll(".pricing-table-features li")),
            c = [].slice.call(i.querySelectorAll(".pricing-table-cta")),
            r = t.concat(a).concat(c);
          e.reveal(r, {
            duration: 600,
            distance: "20px",
            easing: "cubic-bezier(0.5, -0.01, 0, 1.005)",
            interval: 100,
            origin: "bottom",
            viewFactor: .5
          })
        })
    }
  }();
  </script>
</body>

</html>