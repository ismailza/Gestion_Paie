<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
  include ("../CONFIG.php");
  // require_once ("../scripts/inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="<?php echo FAVICON; ?>" />
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/_navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/_settings-panel.html'); ?>
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="card-container">
                  <div class="card-content">
                    <div class="avatar-flip">
                      <img class="img-circle" src="<?php echo"images/profile/default-profile-img.png"; ?>" height="150" width="150">
                    </div>
                    <h2><?php echo "Ismail ZAHIR"; ?></h2>
                    <h4><?php echo "ismailza407@gmail.com"; ?></h4>
                    <form action="../scripts/employe.php" method="post">
                      <?php if(isset($_SESSION['error'])):?>
                        <div class="alert alert-danger" role="alert">
                          <?php 
                            echo $_SESSION['error']; 
                            unset($_SESSION['error']);
                          ?>
                        </div>
                      <?php endif; ?>                
                      <div class="form-group">
                        <label for="current_password">Mot de passe actuel</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Mot de passe actuel" required> 
                        <label for="new_password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Nouveau mot de passe" required> 
                        <label for="confirm_password">Confirmer Mot de passe</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe" required> 
                      </div>
                      <div class="form-group">
                        <input type="submit" name="reset" class="btn btn-warning" value="Modifier">
                        <a href="home.php"><input type="button" class="btn btn-warning" value="Annuler"></a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('partials/_footer.html'); ?>
      </div><!-- main-panel ends -->
    </div><!-- page-body-wrapper ends -->
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include ('partials/_plugins-js.html'); ?>
</body>
</html>