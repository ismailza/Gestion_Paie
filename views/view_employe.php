<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/rh.inc.php';
  if (!isset($_GET['id']) || empty($_GET['id']))
  {
    header("location: view_employes");
    exit();
  }
  require_once '../scripts/employe.inc.php';
  $user1 = getEmploye($_GET['id']);
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
                <div class="container rounded bg-white mt-5 mb-5">
                  <div class="row">
                    <div class="col-md-3 border-right">
                      <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="images/profile/<?php echo $user1['image']; ?>">
                        <span class="font-weight-bold"><?php echo $user1['nom']." ".$user1['prenom']; ?></span>
                        <span class="text-black-50"><?php echo $user1['email']; ?></span>
                        <span class="text-black-50"><?php echo $user1['poste']; ?></span>
                        <br>
                        <span class="alert alert-success">Heures supp : <?php echo is_null($hs = getNbHeuresSuppEmployeThisMonth($user1['idEmploye'])['nbHS'])?0:$hs; ?> heures</span>
                        <span class="alert alert-danger">Absence : <?php echo is_null($abs = getAbsenceEmployeThisMonth($user1['idEmploye'])['nbJours'])?0:$abs; ?> Jours</span>
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
                            <input type="text" class="form-control" name="nom" value="<?php echo $user1['nom']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $user1['prenom']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CIN</label>
                            <input type="text" class="form-control" name="cin" value="<?php echo $user1['cin']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Sexe</label>
                            <input type="text" class="form-control" name="sexe" value="<?php echo $user1['sexe']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user1['phone']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Date de naissance</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $user1['email']; ?>" disabled>
                          </div>
                        </div>                        
                        <div class="row mt-3">
                          <div class="col-md-6">
                            <label class="labels">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="<?php echo $user1['adresse']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Ville</label>
                            <input type="text" class="form-control" name="ville" value="<?php echo $user1['ville']; ?>" disabled>
                          </div>
                        </div>
                        <br>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Situation familiale</h4>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Situation</label>
                            <input type="text" class="form-control" name="situationF" value="<?php echo $user1['situationF']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Nombre d'enfants</label>
                            <input type="text" class="form-control" name="nbEnfants" value="<?php echo $user1['nbEnfants']; ?>" disabled>
                          </div>
                        </div>
                        <br>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Informations salariale</h4>
                        </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">Diplôme</label>
                            <input type="text" class="form-control" name="diplome" value="<?php echo $user1['diplome']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">Salaire de base</label>
                            <input type="text" class="form-control" name="salaireB" value="<?php echo $user1['salaireBase']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CNSS</label>
                            <input type="text" class="form-control" name="numCNSS" value="<?php echo $user1['numCNSS']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">AMO</label>
                            <input type="text" class="form-control" name="numAMO" value="<?php echo $user1['numAMO']; ?>" disabled>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="labels">CIMR</label>
                            <input type="text" class="form-control" name="numCMR" value="<?php echo $user1['numCIMR']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label class="labels">IGR</label>
                            <input type="text" class="form-control" name="numIGR" value="<?php echo $user1['numIGR']; ?>" disabled>
                          </div>
                        </div>

                        <div class="mt-5 text-center">
                          <button class="btn btn-warning profile-button" type="button">Update</button>
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