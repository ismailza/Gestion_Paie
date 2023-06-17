<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  // require_once '../scripts/rp.inc.php'
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

                <div class="title">Ajouter une règle de paie</div>

                <?php if (isset($_SESSION['success'])): ?>
                  <div class="alert alert-success" role="alert">
                    <?php 
                      echo $_SESSION['success']; 
                      unset($_SESSION['success']);
                    ?>
                  </div>
                <?php endif; if (isset($_SESSION['error'])): ?>  
                  <div class="alert alert-danger" role="alert">
                    <?php 
                      echo $_SESSION['error']; 
                      unset($_SESSION['error']);
                    ?>
                  </div>
                <?php endif; ?>  

                <form class="row g-3" action="" method="post">
                  <div class="col-md-10">
                    <label for="output" class="visually-hidden">Password</label>
                    <input type="text" class="form-control" id="output" placeholder="Règle de paie" disabled>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success mb-3">Enregistrer</button>
                  </div>
                </form>
                <div class="m-3"></div>
                <div class="row g-3">
                  <div class="row" id="input">

                    <div class="col-md-2" id="add">
                      <button type="submit" class="btn btn-info mb-3" onclick="regle_paie()">ADD</button>
                    </div>
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
  <script src="js/regle_paie.js"></script>
</body>
</html>