<?php

  include ("../CONFIG.php");
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();  
  
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
  <!-- <link rel="stylesheet" href="vendors/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">  -->
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-4 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row">
              <a href="index"><img src="images/logo1.svg" alt="logo" class="logo"></a>
            </div>
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="https://i.imgur.com/uNGdWHi.png" class="image">
            </div>
          </div>
        </div>
        <form class="col-lg-6" method="post" action="../scripts/recover_password.php">
          <div class="card2 card border-0 px-4 py-5">
            <div class="row mb-4 px-3">
              <h4 class="mb-0 mr-4 mt-2">Récupérer votre mot de passe</h4>
            </div>
            <div class="row px-3 mb-4">
              <div class="line"></div>
              <small class="or text-center"><i class="fa fa-star"></i></small>
              <div class="line"></div>
            </div>
            <?php require_once 'alerts.php'; ?>
            <div class="row px-3">
              <label class="mb-1"><h6 class="mb-0 text-sm">Email</h6></label>
              <input class="mb-4" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="row mb-3 px-3">
              <button type="submit" name="submit" class="btn btn-blue text-center">Continue</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center text-white fixed-bottom" style="background-color: #1A237E; padding: 20px 5px 5px 5px;">
      <small class="ml-4 ml-sm-5 mb-2" style="color: #6F8394;">Copyright &copy; 2023 JI2A. All rights reserved.</small>
  </footer>
  
  <script src="vendors/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
</body>
</html>