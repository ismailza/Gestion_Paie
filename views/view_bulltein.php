<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/bulltein.inc.php';
  $regles = view();

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

                <div class="table-responsive"> 
                <table class="table display" id="table">
                  <thead>
                    <tr>
                      <th>MOIS</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>Janvier</td>
                        <td>
                          <form action="" method="POST">
                            <button name="view" class="btn btn-info btn-rounded btn-icon" >
                              <i class="mdi mdi-eye-outline"></i>
                            </button>
                        
                            <button name="download" onclick="document.getElementById('link').click()" class="btn btn-warning btn-rounded btn-icon">
                            <a id="link" href="sample.pdf" download hidden></a>
                              <i class="mdi mdi-arrow-down-bold-circle-outline"></i>
                            </button>
                          </form>
                          
                      </tr>
                  </tbody>
                </table>
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