<?php 
  include ("../CONFIG.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion de paie</title>
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
  <link rel="stylesheet" href="css/table-style.css">
  <link rel="shortcut icon" href="images/favicon.png" />

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/_navbar.php'); ?>

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/_settings-panel.html'); ?>
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/_sidebar_ERH.html'); ?>

      <!-- partial -->
      <div class="main-panel">
        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab"> 
                
                <div class="title">Liste des employés</div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-info me-md-2" type="button">Ajouter employé</button>
                </div>
                <div class="table-responsive">      
                  <table class="table display" id="table">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>CIN</th>
                        <th>NOM</th>
                        <th>Prénom</th>
                        <th>Date Naissance</th>
                        <th>Email</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img src="images/profile/default-profile-img.png" width="40px" height="40px" alt="profile image"></td>
                        <td>UA123848</td>
                        <td>ZAHIR</td>
                        <td>Ismail</td>
                        <td>17/04/2001</td>
                        <td>ismailza407@gmail.com</td>
                        <td>
                          <button type="button" class="btn btn-info btn-rounded btn-icon">
                            <i class="mdi mdi-eye-outline"></i>
                          </button>
                       
                          <button type="button" class="btn btn-warning btn-rounded btn-icon">
                            <i class="mdi mdi-lead-pencil"></i>
                          </button>
                       
                          <button type="button" class="btn btn-danger btn-rounded btn-icon">
                            <i class="mdi mdi-delete-outline"></i>
                          </button>
                        </td>
                      </tr>
                      
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

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller ends-->

  <!-- plugins:js -->
  <?php include ('partials/_plugins-js.html'); ?>
  <script>
    $(document).ready(function () {
      $('#table').DataTable({
          pagingType: 'full_numbers',
      });
    });
  </script>

</body>
</html>