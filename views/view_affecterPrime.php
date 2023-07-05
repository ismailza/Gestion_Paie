<?php
  require_once "../scripts/inc.php";
  require_once '../scripts/entreprise.inc.php';
  require_once '../scripts/employe.inc.php';
  $entreprises = getAllEntreprise();
  $employes = getAllEmployes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo "SITE_TITLE"; ?></title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    .fh5co-loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(./loader.gif) center no-repeat #fff;
    }
  </style>
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
                <div class="title">Affecter Prime</div>
                <?php require_once 'alerts.php'; ?>
                <div class="card mt-12">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Enumuration</label>
                      <select class="form-select" onchange="changer()" id="choix" required>
                        <option selected disabled value="">Choiser une optione</option>
                        <option value="PD">Prime Defini</option>
                        <option value="PP">Prime Personnalise</option>
                      </select>
                    </div>
                  </fieldset>
                </div>
                <br>
                <div class="card mt-12" id="PD" style="display:none">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <h4>Prime Defini</h4>
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Selectionner entreprise</label>
                      <select class="form-select" required>
                        <option selected disabled value="">Choiser une optione</option>
                        <?php foreach ($entreprises as $entreprise): ?>
                        <option value="<?php echo $entreprise['idEntreprise']; ?>"><?php echo $entreprise['idEntreprise']."\n . ".$entreprise['nomEntreprise']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Selectionner prime</label>
                      <select class="form-select" required>
                        <option selected disabled value="">Choiser une optione</option>
                        <option value="PQ">Primes de qualité</option>
                        <option value="PA">Primes d’assiduité</option>
                        <option value="PP">Primes de penibilite</option>
                        <option value="PS">Primes de sécurité</option>
                      </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <button class="btn btn-info me-md-2" type="submit">Affecter</button>
                      
                    </div>
                  </fieldset>
                </div>
              </div>

              <div class="card mt-12" id="PP" style="display:none">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <h4>Prime Personalisée</h4>
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Selectionner entreprise</label>
                      <select class="form-select" required>
                        <option selected disabled value="">Choiser une optione</option>
                        <?php foreach ($entreprises as $entreprise): ?>
                        <option value="<?php echo $entreprise['idEntreprise']; ?>"><?php echo $entreprise['idEntreprise']."\n . ".$entreprise['nomEntreprise']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Selectionner employee</label>
                      <select class="form-select" required>
                        <option selected disabled value="">Choiser une optione</option>
                        <?php foreach ($employes as $employe): ?>
                        <option value="<?php echo $employe['idEmploye']; ?>"><?php echo $employe['idEmploye']."\n . ".$employe['nom']; ?></option>
                        <?php endforeach; ?>
                        
                      </select>
                    </div>
                  
                    <div class="col-md-6 form-group">
                      <label for="nom" class="form-label">Montant</label><br>
                      <input type="number" class="form-control">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <button class="btn btn-info me-md-2" type="submit">Affecter</button>
                    </div>
                  </fieldset>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <!-- partial:partials/_footer.html -->
  <?php include('partials/_footer.html'); ?>

  </div><!-- main-panel ends -->
  </div><!-- page-body-wrapper ends -->
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include('partials/_plugins-js.html'); ?>
</body>
<script>
  PD = document.getElementById("PD");
  PP = document.getElementById("PP");
  choix = document.getElementById("choix");


  function changer() {
    PD.style = "display:none";
    PP.style = "display:none";
    if (choix.value == "PD") {
      PD.style = "display:block";
    }
    if (choix.value == "PP") {
      PP.style = "display:flex";
    }
  }
</script>

</html>