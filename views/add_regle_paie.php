<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/rp.inc.php';
  require_once '../scripts/entreprise.inc.php';
  $entreprises = getAllEntreprise();
  $rubriques = getAllRubriques();
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
                <?php require_once 'alerts.php'; ?> 
                <form class="row g-3" action="../scripts/entreprise.php" method="post">

                  <div class="col-md-4">
                    <label for="entreprise" class="form-label">Entreprise</label>
                    <select class="form-select" id="entreprise" name="entreprise" required>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($entreprises as $entreprise): ?>
                      <option value="<?php echo $entreprise['idEntreprise']; ?>"><?php echo $entreprise['idEntreprise']."\t . ".$entreprise['nomEntreprise']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="rubrique" class="form-label">Rubrique</label>
                    <select class="form-select" id="rubrique" name="rubrique" required>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($rubriques as $rubrique): ?>
                      <option value="<?php echo $rubrique['idRubrique']; ?>"><?php echo $rubrique['shortName']."\t . ".$rubrique['nomRubrique']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info mb-3 mt-4" onclick="document.location.href='#rubriqueModal'" data-bs-toggle="modal" data-bs-target="#rubriqueModal">Ajouter rubrique</button>
                  </div>
                  <div class="col-md-10">
                    <label for="output" class="visually-hidden">Règle de paie</label>
                    <input type="text" class="form-control" name="formule" id="output" placeholder="Règle de paie" readonly>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" name="add_regle" class="btn btn-success mb-3">Enregistrer</button>
                  </div>
                </form>
                <div class="m-3"></div>
                <div class="row g-3">
                  <style>
                    #input input, #input select, #input button {
                      margin: 2px;
                    }
                  </style>
                  <div class="row" id="input">

                    <div class="col-md-1" id="add">
                      <span class="badge badge-opacity-info mt-2" role="button" onclick="regle_paie(this.parentNode)"><i class="mdi mdi-plus"></i></span>
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