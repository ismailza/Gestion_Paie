<?php 
  include ("../CONFIG.php");
  // require_once ("../controllers/inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
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
      <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="container rounded bg-white mt-5 mb-5">
                  <div class="row">
                    <div class="col-md-3 border-right">
                      <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">Ismail ZAHIR</span>
                        <span class="text-black-50">ismailza407@mail.com</span>
                        <span> </span>
                      </div>
                    </div>
                    <div class="col-md-9 border-right">
                      <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Informations personnelle</h4>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">NOM</label>
                            <input type="text" class="form-control" value="<?php echo "NOM"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Prénom</label>
                            <input type="text" class="form-control" value="<?php echo "Prénom"; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CIN</label>
                            <input type="text" class="form-control" value="<?php echo "CIN"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Sexe</label>
                            <input type="text" class="form-control" value="<?php echo "Sexe"; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" value="<?php echo "Phone"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Date de naissance</label>
                            <input type="text" class="form-control" value="<?php echo "Date Naissance"; ?>" disabled>
                          </div>
                        </div>                        
                        <div class="row mt-3">
                          <div class="col-md-6">
                            <label class="labels">Adresse</label>
                            <input type="text" class="form-control" value="<?php echo "Adresse"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Ville</label>
                            <input type="text" class="form-control" value="<?php echo "Ville"; ?>" disabled>
                          </div>
                        </div>
                        <br>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Situation familiale</h4>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Situation</label>
                            <input type="text" class="form-control" value="<?php echo "Situation"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Nombre d'enfants</label>
                            <input type="text" class="form-control" value="<?php echo "Nombre d'enfants"; ?>" disabled>
                          </div>
                        </div>
                        <br>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Informations salariale</h4>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Diplôme</label>
                            <input type="text" class="form-control" value="<?php echo "Diplome"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Salaire de base</label>
                            <input type="text" class="form-control" value="<?php echo "Salaire de base"; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CNSS</label>
                            <input type="text" class="form-control" value="<?php echo "CNSS"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">AMO</label>
                            <input type="text" class="form-control" value="<?php echo "AMO"; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CIMR</label>
                            <input type="text" class="form-control" value="<?php echo "CIMR"; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">IGR</label>
                            <input type="text" class="form-control" value="<?php echo "IGR"; ?>" disabled>
                          </div>
                        </div>

                        <div class="mt-5 text-center">
                          <button class="btn btn-danger profile-button" type="button">Déconnection</button>
                        </div>

                      </div>
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
</body>
</html>