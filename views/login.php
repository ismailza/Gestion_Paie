<?php
require_once '../CONFIG.php';
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
if (isset($_SESSION['auth'])) 
{
  header("location: home");
  die();
}
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
  <?php if (isset($_SESSION['warning'])) : ?>
            <div class="alert alert-warning" role="alert">
              <?php
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
                ?>
            </div>
            <?php endif; ?>
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row">
              <a href="index"><img src="images/logo1.svg" alt="logo" class="logo"></a>
            </div>
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="https://e.uman.app/frontend/web/company_sys_assets/Login/en/images/uNGdWHi.png " class="image">
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
              <a href="forget_password" class="ml-auto mb-0 text-sm">Forgot Password?</a>
            </div>
            <div class="row mb-3 px-3">
              <button type="submit" name="submit" class="submit btn btn-blue text-center">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center text-white fixed-bottom" style="background-color: #1A237E; padding: 20px 5px 5px 5px;">
      <small class="ml-4 ml-sm-5 mb-2" style="color: #6F8394;">Copyright &copy; 2023 JI2A. All rights reserved.</small>
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