<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/employe.inc.php';
  require_once '../scripts/entreprise.inc.php';
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
                <?php require_once 'alerts.php'; ?>

                <?php // * Responsable RH
                if ($_SESSION['auth']['poste'] == "Responsable Ressources Humaines"): ?>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      <div>
                        <p class="statistics-title">Total des employés</p>
                        <h3 class="rate-percentage"><?php echo getNbEmployes()['nbEmployes']; ?></h3>
                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                      </div>
                      <div>
                        <p class="statistics-title">Total des entreprises</p>
                        <h3 class="rate-percentage"><?php echo getNbEntreprise()['nbEntreprise']; ?></h3>
                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                      </div>
                      <div>
                        <p class="statistics-title">Total des absences ce mois</p>
                        <h3 class="rate-percentage"><?php echo is_null($nba = getNbJoursAbsenceThisMonth()['nbJours'])?0:$nba; ?> jours</h3>
                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>5</span></p>
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title">Total des réclamations</p>
                        <h3 class="rate-percentage"><?php echo getNbReclamation()['nbReclamation']; ?></h3>
                        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title">Les heures supplimentaire</p>
                        <h3 class="rate-percentage"><?php echo is_null($nbhs = getNbHeuresSupp()['nbHS'])?0:$nbhs; ?> heures</h3>
                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>8</span></p>
                      </div>
                    </div>
                  </div>
                </div> 
                

                <?php // * Responsable Paie
                elseif ($_SESSION['auth']['poste'] == "Responsable Paie"): ?>

                <?php else: ?>

                <?php endif; ?>
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