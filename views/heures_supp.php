<?php
  require_once '../scripts/inc.php';
  require_once '../scripts/connect.php';
  
  $req = "SELECT * FROM heuressupp ";
  $stmt = $pdo->prepare($req);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
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
  <link rel="stylesheet" href="css/table-style.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
  <div id = "progreassbar"></div>
  <div id = "scrollPath"></div>
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
                
                <div class="title">liste des heures supplémentaires </div>
                
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
                  <table class="table display" >
                  <tr>
            <th>Date</th><th>Status</th><th>nbHS</th> 
        
                    <tbody>
                    <?php foreach ($result as $row) {?>
            <tr>
                <td><?php echo ($row['dateTravail']) ?></td>
                <td> <?php echo ($row['status']) ?></td>
                <td><?php echo ($row['nbHs']) ?></td>
               
                </tr>

                
            <?php }   ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('partials/_footer.html'); ?>
      </div><!-- main-panel ends -->
    </div><!-- page-body-wrapper ends -->
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include ('partials/_plugins-js.html'); ?>
</body>
</html>