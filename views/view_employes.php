<?php
// require_once("../CONFIG.php");
// require_once ("../scripts/inc.php");
require_once '../scripts/employe.inc.php';
$employes = getAllEmployes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo "Gestion de paie"; ?></title>
  <link rel="shortcut icon" href="<?php echo ""; ?>" />
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
  <link rel="stylesheet" href="css/table-style.css">
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

                <div class="title">Liste des employés</div>

                <?php if (isset($_SESSION['success'])) : ?>
                  <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                  </div>
                <?php endif;
                if (isset($_SESSION['error'])) : ?>
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
                        <th>Image</th>
                        <th>CIN</th>
                        <th>NOM</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Date Naissance</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($employes as $employe) : ?>
                        <tr>
                          <td><img src="<?php echo $employe['image']; ?>" width="40px" height="40px" alt="profile image">
                          </td>
                          <td><?php echo $employe['cin']; ?></td>
                          <td><?php echo $employe['nom']; ?></td>
                          <td><?php echo $employe['prenom']; ?></td>
                          <td><?php echo $employe['sexe']; ?></td>
                          <td><?php echo $employe['dateNaiss']; ?></td>
                          <td><?php echo $employe['email']; ?></td>
                          <td><?php echo $employe['phone']; ?></td>
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
                      <?php endforeach; ?>
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
  <?php include('partials/_plugins-js.html'); ?>
</body>

</html>