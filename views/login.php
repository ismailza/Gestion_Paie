<?php
include("../CONFIG.php");
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
// if (isset($_SESSION['auth'])) header("location: home.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/landing.css">
</head>

<body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-4 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row">
              <a href="index.php"><img src="https://i.imgur.com/CXQmsmF.png" alt="logo" class="logo"></a>
            </div>
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="https://i.imgur.com/uNGdWHi.png" class="image">
            </div>
          </div>
        </div>
        <form class="col-lg-6 needs-validation" method="post" action="../scripts/login.inc.php" novalidate>
          <div class="step1 card2 card border-0 px-4 py-5">
            <div class="row mb-4 px-3">
              <h4 class="mb-0 mr-4 mt-2">Bienvenue</h4>
            </div>
            <div class="row px-3 mb-4">
              <div class="line"></div>
              <small class="or text-center"><i class="fa fa-star"></i></small>
              <div class="line"></div>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger" role="alert">
              <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
            <?php endif; ?>
            <div class="row px-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="login" placeholder="Email" required>
            </div>
            <div class="row px-3">
              <label for="password" class="form-label">Last name</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="row px-3 mb-4">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input id="chk1" type="checkbox" name="remember" class="custom-control-input">
                <label for="chk1" class="custom-control-label text-sm">Remember me</label>
              </div>
              <a href="forget_password.php" class="ml-auto mb-0 text-sm">Forgot Password?</a>
            </div>
            <div class="row mb-3 px-3">
              <button type="submit" name="submit" class="submit btn btn-blue text-center">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="site-footer text-light" style="background-color: #1A237E;color:#fff">
    <div class="container">
      <div class="site-footer-inner has-top-divider">
        <div class="brand footer-brand">
          <a href="#">
            <svg width="0" height="0" viewBox="0 0 48 32" xmlns="http://www.w3.org/2000/svg">

            </svg>
          </a>
        </div>

        <ul class="footer-social-links list-reset">
          <li>
            <a href="#">
              <span class="screen-reader-text">Facebook</span>
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                  fill="#FFFFFF" />
              </svg>
            </a>
          </li>
          <li>
            <a href="">
              <span class="screen-reader-text">Google</span>
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
                  fill="#FFFFFF" />
              </svg>
            </a>
          </li>
        </ul>
        <div class="footer-copyright">&copy; 2023 JI2A, all rights reserved</div>
      </div>
    </div>
  </footer>

  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
  </script>
</body>

</html>